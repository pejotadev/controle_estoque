<?php
namespace App\Controller;

use Rest\Controller\RestController;

/**
 * Subtypes Controller
 *
 * @property \App\Model\Table\SubtypesTable $Subtypes
 *
 * @method \App\Model\Entity\Subtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubtypesController extends RestController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $subtypes = $this->Subtypes->find('all', [
            'contain' => ['Types'],
        ]);
        $this->set(array(
            'subtypes' => $subtypes,
            '_serialize' => ['subtypes']
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Subtype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subtype = $this->Subtypes->findById($id);
        $this->set(array(
            'subtype' => $subtype,
            '_serialize' => ['subtype']
        ));
        $this->set('subtype', $subtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = 'Error';
        $subtype = $this->Subtypes->newEntity();
        if ($this->request->is('post')) {
            $subtype = $this->Subtypes->patchEntity($subtype, $this->request->getData());
            if ($this->Subtypes->save($subtype)) {
                $message = 'Saved';
            }
            $this->Flash->error(__('The subtype could not be saved. Please, try again.'));
        }

        $this->set(array(
            'message' => $message,
            'subtype' => $subtype,
            '_serialize' => array('message')
        ));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = 'Error';
        $subtype = $this->Subtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subtype = $this->Subtypes->patchEntity($subtype, $this->request->getData());
            if ($this->Subtypes->save($subtype)) {
                $message = 'Saved';
            }
        }

        $this->set(array(
            'message' => $message,
            'subtype' => $subtype,
            '_serialize' => array('message')
        ));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subtype = $this->Subtypes->get($id);
        if ($this->Subtypes->delete($subtype)) {
            $message = 'The subtype has been deleted.';
        } else {
            $message = 'The subtype could not be deleted. Please, try again.';
        }

        $this->set(array(
            'message' => $message,
            'name' => $subtype.subtype,
            '_serialize' => array('message')
        ));
    }
}
