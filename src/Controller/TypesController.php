<?php
namespace App\Controller;


use phpDocumentor\Reflection\Types\Array_;
use Rest\Controller\RestController;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 *
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends RestController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        $types = $this->Types->find('all')
        ->select(['Types.id', 'Types.type']);
        $subtypes = new SubtypesController();
        $products = new ProductsController();

        foreach ($types as $type){
            $eachSubtypeType = $subtypes->Subtypes->find('all')
                ->where([
                    'Subtypes.status' => 1,
                    'Subtypes.types_id' => $type->id
                ]);
            $type->Subtypes = array();
            foreach ($eachSubtypeType as $sub){
                $type->Subtypes[$sub->subtype] = array();

                $eachProducts = $products->Products->find('all')
                    ->select(['Products.product'])
                    ->where([
                        'Products.status' => 1,
                        'Products.subtypes_id' => $sub->id
                    ]);
                $sub->Products = array();
                foreach ($eachProducts as $prod){
                    array_push($type->Subtypes[$sub->subtype],$prod);
                }

            }

        }


        $this->set(array(
            'types' => $types,
            '_serialize' => ['subtypes']
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('type', $type);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $users = $this->Types->Users->find('list', ['limit' => 200]);
        $this->set(compact('type', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $users = $this->Types->Users->find('list', ['limit' => 200]);
        $this->set(compact('type', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
