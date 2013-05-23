<?php
$this->pageTitle = Yii::app()->name . ' - Manage Accounts';
$this->breadcrumbs = array(
    'Manage Accounts',
);
?>


                <h1>Manage Accounts</h1>


               
       <?php
 $dataProvider = new CActiveDataProvider('approve', array(
                                                        'criteria' => array(
                                                                    'with'=>array('company'),
                                   //                             'condition'=>'status=0',
                                                        //'params'=>array(':status'=>0),
                                        )));
       
         $this->widget('zii.widgets.grid.CGridView', array(
  
                    'dataProvider' => $dataProvider,
                    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView.css'),
                    'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                    'htmlOptions' => array('class' => 'grid-view rounded'),
                    'columns' => array(
                        'CID', // display the 'title' attribute
                        'company.cname', // display the 'name' attribute of the 'category' relation
                        'company.email', // display the 'content' attribute as purified HTML
                        array(            // display 'author.username' using an expression
                            'name'=>'authorName',
                            //'value'=>'$data->company->cname',
                        ),
                        //'role',
                        array(// display a column with "view", "update" and "delete" buttons
                            'class' => 'CButtonColumn',
                            'deleteConfirmation' => "js:'Are you sure you want to remove this job?'",
                            'buttons' => array
                                (
                                'update' => array
                                    (
                                    'label' => 'Update',
                          //          'url' => 'Yii::app()->createUrl("job/update", array("JID"=>$data->JID ))',
                                   ),
                                'view' => array
                                    (
                                    'label' => 'View',
                            //        'url' => 'Yii::app()->createUrl("job/job", array("JID"=>$data->JID ))',
                                   
                                 //   'imageUrl' => Yii::app()->request->baseUrl . '/images/view.png',
                                 ),
                                'delete' => array
                                    (
                                    'label' => 'Delete',
                              //      'url' => 'Yii::app()->createUrl("job/delete", array("JID"=>$data->JID ))',
                                   // 'imageUrl' => Yii::app()->request->baseUrl . '/images/remove.png',
                                  )
                            )
                        )
                    )
                        )
                );
                ?>




