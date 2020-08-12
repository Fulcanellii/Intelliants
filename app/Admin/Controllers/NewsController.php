<?php

namespace App\Admin\Controllers;

use App\Company;
use App\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->column('id', ('Id'));
        $grid->column('title', ('Title'));
        $grid->column('status', ('Status'));
        $grid->column('created_at', ('Created at'));
        $grid->column('updated_at', ('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(News::findOrFail($id));

        $show->field('id', ('Id'));
        $show->field('title', ('Title'));
        $show->field('description', ('Description'));
        $show->field('status', ('Status'));
        $show->field('created_at', ('Created at'));
        $show->field('updated_at', ('Updated at'));

        $show->companies('companies', function ($author) {

            $author->setResource('/admin/companies');

            $author->id();
            $author->title();
        });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->text('title', ('Title'))->required();
        $form->textarea('description', ('Description'))->required();
        $form->switch('status', ('Status'));

        $form->multipleSelect('companies', 'Company')->options(Company::all()->pluck('title','id'));

        return $form;
    }
}
