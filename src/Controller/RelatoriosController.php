<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Relatorios Controller
 *
 * @property \App\Model\Table\RelatoriosTable $Relatorios
 * @method \App\Model\Entity\Relatorio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelatoriosController extends AppController
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
        $query = $this->Relatorios->find('all');

        $ym = $query
            ->select([
                'ym' => 'DATE_FORMAT(Relatorios.data, "%Y-%m")',
                'volume_biogas_mes' => $query->func()->sum('Relatorios.volume_biogas_dia') 
            ])
            ->group(['ym'])
            ->orderBy(['ym' => 'DESC']);
        
        $this->paginate = ['limit' => 1];  // One month per page
        
        $meses = $this->paginate($ym);

        $currentMonth = $meses->first();
        
        [$year, $month] = explode('-', $currentMonth->ym);
        
        $results = $this->Relatorios->find('all')
            ->where([
                'YEAR(Relatorios.data)' => $year,
                'MONTH(Relatorios.data)' => $month,
            ])
            ->orderBy(['Relatorios.data' => 'ASC'])
            ->contain(['Users', 'Instituicoes']);
        
        $relatorios = $results;
        
        $clientes = $this->fetchTable('Clientes')->find()->all();
        
        $this->set(compact('relatorios', 'clientes', 'meses', 'month'));
    }

    /**
     * View method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relatorio = $this->Relatorios->get($id, [
            'contain' => ['Users', 'Instituicoes'],
        ]);
        $clientes = $this->fetchTable('Clientes')->find()->all();
        $this->set(compact('relatorio', 'clientes'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relatorio = $this->Relatorios->newEmptyEntity();
        if ($this->request->is('post')) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->getData());
            
            if (!$relatorio->user_id) { 
                $user = $this->Authentication->getIdentity();
                $relatorio->user_id = $user->get('id'); 
            }
            
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Relatorios->Instituicoes->find('list');
        $clientes = $this->fetchTable('Clientes')->find()->all();
        $this->set(compact('relatorio', 'instituicoes', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relatorio = $this->Relatorios->get($id, [
            'contain' => ['Instituicoes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->getData());
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Relatorios->Instituicoes->find('list');
        $clientes = $this->fetchTable('Clientes')->find()->all();
        $this->set(compact('relatorio', 'instituicoes', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relatorio = $this->Relatorios->get($id);
        if ($this->Relatorios->delete($relatorio)) {
            $this->Flash->success(__('The relatorio has been deleted.'));
        } else {
            $this->Flash->error(__('The relatorio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
