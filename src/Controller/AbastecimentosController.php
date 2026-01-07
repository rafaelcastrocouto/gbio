<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Abastecimentos Controller
 *
 * @property \App\Model\Table\AbastecimentosTable $Abastecimentos
 * @method \App\Model\Entity\Abastecimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AbastecimentosController extends AppController
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
        $abastecimentos = $this->paginate($this->Abastecimentos->find('all')
            ->contain(['Users', 'Instituicoes', 'Clientes']));
        
        $this->set(compact('abastecimentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Abastecimento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abastecimento = $this->Abastecimentos->get($id, ['contain' => ['Users', 'Instituicoes', 'Clientes']]);
        $this->set(compact('abastecimento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abastecimento = $this->Abastecimentos->newEmptyEntity();

        try {
            $this->Authorization->authorize($abastecimento);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['action' => 'index']);
        }
        
        if ($this->request->is('post')) {
            $abastecimento = $this->Abastecimentos->patchEntity($abastecimento, $this->request->getData());

            if (!$abastecimento->user_id) { 
                $user = $this->Authentication->getIdentity();
                $abastecimento->user_id = $user->get('id'); 
            }
            
            if ($this->Abastecimentos->save($abastecimento)) {
                $this->Flash->success(__('The abastecimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The abastecimento could not be saved. Please, try again.'));
        }
        
        $instituicoes = $this->Abastecimentos->Instituicoes->find('list');
        $clientes = $this->Abastecimentos->Clientes->find('list');
        $this->set(compact('abastecimento', 'instituicoes', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Abastecimento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abastecimento = $this->Abastecimentos->get($id, [
            'contain' => ['Instituicoes', 'Clientes'],
        ]);

        try {
            $this->Authorization->authorize($abastecimento);
        } catch (ForbiddenException $error) {
            $user_session = $this->request->getAttribute('identity');
            $this->Flash->error('Authorization error: ' . $error->getMessage());
            return $this->redirect(['action' => 'index']);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abastecimento = $this->Abastecimentos->patchEntity($abastecimento, $this->request->getData());
            if ($this->Abastecimentos->save($abastecimento)) {
                $this->Flash->success(__('The abastecimento has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The abastecimento could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Abastecimentos->Instituicoes->find('list');
        $clientes = $this->Abastecimentos->Clientes->find('list');
        $this->set(compact('abastecimento', 'instituicoes', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Abastecimento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abastecimento = $this->Abastecimentos->get($id);
        if ($this->Abastecimentos->delete($abastecimento)) {
            $this->Flash->success(__('The abastecimento has been deleted.'));
        } else {
            $this->Flash->error(__('The abastecimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
