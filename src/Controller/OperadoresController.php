<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Operadores Controller
 *
 * @property \App\Model\Table\OperadoresTable $Operadores
 * @method \App\Model\Entity\Operador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperadoresController extends AppController
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
            $this->Authorization->authorize($this->Operadores->newEmptyEntity());
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        $query = $this->Operadores->find('all', ['contain' => ['Users'] ]);
        $operadores = $this->paginate($query);
        $this->set(compact('operadores'));
    }

    /**
     * View method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operador = $this->Operadores->get($id, [
            'contain' => ['Users'],
        ]);
        try {
            $this->Authorization->authorize($operador);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        $this->set(compact('operador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operador = $this->Operadores->newEmptyEntity();
        try {
            $this->Authorization->authorize($operador);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        if ($this->request->is('post')) {
            $operador = $this->Operadores->patchEntity($operador, $this->request->getData());
            
            if (!$operador->user_id) { 
                $user = $this->Authentication->getIdentity();
                $operador->user_id = $user->get('id'); 
            }
            
            if ($this->Operadores->save($operador)) {
                $this->Flash->success(__('The operador has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $operador->user_id]);
            }
            $this->Flash->error(__('The operador could not be saved. Please, try again.'));
        }
        $this->set(compact('operador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operador = $this->Operadores->get($id, [
            'contain' => ['Users'],
        ]);
        try {
            $this->Authorization->authorize($operador);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operador = $this->Operadores->patchEntity($operador, $this->request->getData());
            if ($this->Operadores->save($operador)) {
                $this->Flash->success(__('The operador has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The operador could not be saved. Please, try again.'));
        }
        $this->set(compact('operador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operador = $this->Operadores->get($id);
        try {
            $this->Authorization->authorize($operador);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $user_session->id]);
        }
        if ($this->Operadores->delete($operador)) {
            $this->Flash->success(__('The operador has been deleted.'));
        } else {
            $this->Flash->error(__('The operador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'view', $operador->user_id]);
    }
}
