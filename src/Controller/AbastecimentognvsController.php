<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Abastecimentognvs Controller
 *
 * @property \App\Model\Table\AbastecimentognvsTable $Abastecimentognvs
 * @method \App\Model\Entity\Abastecimentognv[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AbastecimentognvsController extends AppController
{
    /**
     * beforeFilter method
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $this->Authorization->authorize($this->Abastecimentognvs->newEmptyEntity());
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        $query = $this->Abastecimentognvs->find('all')->contain(['Users' => ['Operadores', 'Supervisores'], 'Instituicoes', 'Clientes']);
        $abastecimentognvs = $this->paginate($query);
        $this->set(compact('abastecimentognvs'));
    }

    /**
     * View method
     *
     * @param string|null $id Abastecimentognv id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abastecimentognv = $this->Abastecimentognvs->get($id, ['contain' => ['Users', 'Instituicoes', 'Clientes']]);
        $this->set(compact('abastecimentognv'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abastecimentognv = $this->Abastecimentognvs->newEmptyEntity();

        try {
            $this->Authorization->authorize($abastecimentognv);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['action' => 'index']);
        }
        
        if ($this->request->is('post')) {
            $abastecimentognv = $this->Abastecimentognvs->patchEntity($abastecimentognv, $this->request->getData());
            
            if (!$abastecimentognv->user_id) { 
                $user = $this->Authentication->getIdentity();
                $abastecimentognv->user_id = $user->get('id'); 
            }
            
            if ($this->Abastecimentognvs->save($abastecimentognv)) {
                $this->Flash->success(__('The abastecimentognv has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The abastecimentognv could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Abastecimentognvs->Instituicoes->find('list');
        $clientes = $this->Abastecimentognvs->Clientes->find('list');
        $this->set(compact('abastecimentognv', 'instituicoes', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Abastecimentognv id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abastecimentognv = $this->Abastecimentognvs->get($id, [
            'contain' => ['Instituicoes', 'Clientes'],
        ]);

        try {
            $this->Authorization->authorize($abastecimentognv);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['action' => 'index']);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abastecimentognv = $this->Abastecimentognvs->patchEntity($abastecimentognv, $this->request->getData());
            if ($this->Abastecimentognvs->save($abastecimentognv)) {
                $this->Flash->success(__('The abastecimentognv has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The abastecimentognv could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Abastecimentognvs->Instituicoes->find('list');
        $clientes = $this->Abastecimentognvs->Clientes->find('list');
        $this->set(compact('abastecimentognv', 'instituicoes', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Abastecimentognv id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abastecimentognv = $this->Abastecimentognvs->get($id);
        try {
            $this->Authorization->authorize($abastecimentognv);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        
        if ($this->Abastecimentognvs->delete($abastecimentognv)) {
            $this->Flash->success(__('The abastecimentognv has been deleted.'));
        } else {
            $this->Flash->error(__('The abastecimentognv could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search () 
    {
        try {
            $this->Authorization->authorize($this->Abastecimentognvs->newEmptyEntity());
        } catch (ForbiddenException $error) {
            $this->Flash->error('Erro de authorização: ' . $error->getMessage());
            return $this->redirect('/');
        }
        $condition = ['Abastecimentognvs.id' => ''];
        
        $nome = $this->getRequest()->getQuery('nome');
        if ($nome) { $condition = ['Users.nome LIKE' => '%' . $nome . '%']; }
        
        $email = $this->getRequest()->getQuery('email');
        if ($email) { $condition = ['Users.email' => $email]; }

        $motorista = $this->getRequest()->getQuery('motorista');
        if ($motorista) { $condition = ['Abastecimentognvs.motorista LIKE' => '%' . $motorista . '%']; }

        $rg = $this->getRequest()->getQuery('rg');
        if ($rg) { $condition = ['Abastecimentognvs.rg' => $rg]; }
                
        $placa = $this->getRequest()->getQuery('placa');
        if ($placa) { $condition = ['Abastecimentognvs.placa' => $placa]; }
                
        $prefixo = $this->getRequest()->getQuery('prefixo');
        if ($prefixo) { $condition = ['Abastecimentognvs.prefixo' => $prefixo]; }
                
        $observacoes = $this->getRequest()->getQuery('observacoes');
        if ($observacoes) { $condition = ['Abastecimentognvs.observacoes LIKE' => '%' . $observacoes . '%']; }
        
        $result = $this->Abastecimentognvs->find('all',  ['conditions' => $condition ])->contain(['Users']);
        $abastecimentognvs = $this->paginate($result);
        $this->set(compact('abastecimentognvs'));
    }
}
