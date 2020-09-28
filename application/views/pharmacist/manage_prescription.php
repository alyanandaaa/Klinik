<div class="box">

    <div class="box-header">

    

        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if(isset($edit_profile)):?>

            <li class="active">

                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

                    <?php echo get_phrase('edit_prescription');?>

                        </a></li>

            <?php endif;?>

            <li class="<?php if(!isset($edit_profile))echo 'active';?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

                    <?php echo get_phrase('prescription_list');?>

                        </a></li>

        </ul>

        <!------CONTROL TABS END------->

        

    </div>

    <div class="box-content padded">

        <div class="tab-content">

            <!----EDITING FORM STARTS---->

            <?php if(isset($edit_profile)):?>

            <div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                    <?php foreach($edit_profile as $row):?>

                    <?php echo form_open('pharmacist/manage_prescription/edit/do_update/'.$row['prescription_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('patient');?></label>

                                 <div class="controls">

                                    <?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?>

                                </div>

                            </div>

                            <div class="control-group">

                            <label class="control-label"><?php echo get_phrase('obat');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="medicine_category_id">

                                        <?php 

                                        $medicine_category    =   $this->db->get('medicine_category')->result_array();

                                        foreach($medicine_category as $row):

                                        ?>

                                            <option value="<?php echo $row['medicine_category_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                            <label class="control-label"><?php echo get_phrase('obat_dari_pharmacist');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="medicine_id">

                                        <?php 

                                        $medicine    =   $this->db->get('medicine')->result_array();

                                        foreach($medicine as $row):

                                        ?>

                                            <option value="<?php echo $row['medicine_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('edit_prescription');?></button>

                        </div>

                    <?php echo form_close();?>

                    
                    <?php endforeach;?>

                </div>

            </div>

            <?php endif;?>

            <!----EDITING FORM ENDS--->

            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

                

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                    <thead>

                        <tr>

                            <th><div>#</div></th>

                            <th><div><?php echo get_phrase('patient');?></div></th>

                            <th><div><?php echo get_phrase('obat');?></div></th>

                            <th><div><?php echo get_phrase('obat_dari_pharmacist');?></div></th>

                            <th><div><?php echo get_phrase('options');?></div></th>

                            

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1;foreach($prescriptions as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('medicine',$row['medicine_id'],'name');?></td>

                            <td><?php echo $this->crud_model->get_type_name_by_id('medicine_category',$row['medicine_category_id'],'name');?></td>

                            <td align="center">

                                <a href="<?php echo base_url();?>index.php?pharmacist/manage_prescription/edit/<?php echo $row['prescription_id'];?>"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-blue">

                                        <i class="icon-wrench"></i>

                                </a>

                                <a href="<?php echo base_url();?>index.php?pharmacist/manage_prescription/delete/<?php echo $row['prescription_id'];?>" onclick="return confirm('delete?')"

                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-red">

                                        <i class="icon-trash"></i>

                                </a>

                            </td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

            </div>

            <!----TABLE LISTING ENDS--->

        </div>

    </div>

</div>



