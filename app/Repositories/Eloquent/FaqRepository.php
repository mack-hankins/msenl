<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Faq;
use Msenl\Repositories\FaqRepositoryInterface;

/**
 * Class FaqRepository
 * @package Msenl\Repositories\Eloquent
 */
class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{

    /**
     * FaqRepository constructor.
     * @param Faq $model
     */
    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function allByOrder()
    {
        return $this->model->orderBy('order', 'asc')->get();
    }

    /**
     * @return bool
     */
    public function lastOrder()
    {
        $order = $this->model->select('order')->orderBy('order', 'desc')->first();
        if($order)
        {
            return $order->order;
        }

        return false;
    }

    /**
     * @param $data
     * @return static
     */
    public function store($data)
    {
        $faq = $this->model->create($data);

        return $faq;
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $faq = $this->model->find($id);
        $faq->fill($data);
        $faq->save();

        return $faq;
    }

    /**
     * @return mixed
     */
    public function tableData()
    {
        return $this->model->select('id', 'question', 'order');
    }

    /**
     * @param $id
     * @param $newOrder
     * @return mixed
     */
    public function updateOrder($id, $newOrder)
    {
        return $this->model->where('id', '=', $id)->update(['order' => $newOrder]);
    }
}