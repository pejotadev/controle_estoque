<?php
namespace App\Controller;

use Rest\Controller\RestController;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends RestController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $products = $this->Products->find('all', [
            'conditions' => ['Products.status' => '1'],
            'contain' => ['Subtypes' => ['Types'], 'Users'],
        ]);

        $products = $this->Products->find('all')
        ->select(['Products.product', 'Subtypes.subtype', 'Users.name', 'Types.type'])
        ->contain(['Subtypes' => ['Types'], 'Users']);

        $this->set(array(
            'products' => $products,
            '_serialize' => ['products']
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->findById($id);
        $this->set(array(
            'product' => $product,
            '_serialize' => ['products']
        ));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = 'Error';
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $message = $product;
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $message = 'Saved';
            }
        }

        $this->set(array(
            'message' => $message,
            'product' => $product,
            '_serialize' => array('message')
        ));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = 'Error';
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $message = 'Saved';
            }
        }
        $this->set(array(
            'message' => $message,
            'product' => $product,
            '_serialize' => array('message')
        ));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $message = 'The product has been deleted.';
        } else {
            $message = 'The product could not be deleted. Please, try again.';
        }

        $this->set(array(
            'message' => $message,
            'name' => $product.product,
            '_serialize' => array('message')
        ));
    }
}
