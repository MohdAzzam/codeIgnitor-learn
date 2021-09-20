<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Articles as ArticlesModule;

class Articles extends Controller
{
    public function index()
    {
        $model = new ArticlesModule();
        $data = [
            'articles' => $model->paginate(2),
            'pager' => $model->pager
        ];
        return view('articles/index', $data);
    }

    public function add()
    {
        return view('articles/create');
    }

    public function create()
    {

        $model = new ArticlesModule();
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'title' => 'required',
                'body' => 'required'
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                helper(['form']);
                echo view('articles/index', $data);
            } else {
                $model->save([
                    'title' => $this->request->getPost('title'),
                    'body' => $this->request->getPost('body'),
                    'user_id' => $this->request->getPost('user_id'),
                ]);
                $session = session();
                $session->setFlashdata('added', 'Article Successful Added ...');
                return redirect()->to('articles/index');

            }
        }
    }

    /***
     *
     * Return Articles to specific user
     * @return string
     */
    public function getArticlesByUser()
    {
        $model = new ArticlesModule();
        $id = session()->get('id');
        $data = [
            'articles' => $model->where('user_id', $id)->asArray()->findAll()
        ];
        return view('articles/myArticles', $data);

    }

    public function updateArticleById()
    {
        $id = $this->request->getGet('id');
        $model = new ArticlesModule();
        $data = [
            'article' => $model->where('id', $id)->first()
        ];
        return view('articles/update', $data);
    }

    public function updateArticle()
    {
        $model = new ArticlesModule();
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'title' => 'required',
                'body' => 'required'
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                helper(['form']);
                echo view('articles/index', $data);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'title' => $this->request->getPost('title'),
                    'body' => $this->request->getPost('body'),];
                $model->update($id,$data);
                $session = session();
                $session->setFlashdata('update', 'Article Successfuly Updated ...');
                return redirect()->to('articles/index');
            }
        }

    }
    public  function deleteArticle(){
        $model = new ArticlesModule();
        $id = $this->request->getGet('id');
        $model->delete($id);
        return redirect()->to('articles/index');

    }

}