<!-- ========= SCHOOLYEAR MODAL ======== -->
<?php echo '<div id="editModal'.$row['sgid'].'" class="modal fade">
<form action="crud_function.php" method="post">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 style="margin:0px;" class="modal-title">Edit Student Grade</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" value="'.$row['sgid'].'" name="hidden_id" id="hidden_id"/>
            <div class="form-group">
                <label>School Year: </label>
                <input readonly name="txt_edit_sy" id="txt_edit_sy" class="form-control input-sm" type="text" value="'.$row['schoolyear'].'" />
            </div>
            <div class="form-group">
                <label>Class: </label>
                <input readonly name="txt_edit_class" id="txt_edit_class" class="form-control input-sm" type="text" value="'.$row['classname'].'" />
            </div>
            <div class="form-group">
                <label>Subject: </label>
                <input readonly name="txt_edit_subj" id="txt_edit_subj" class="form-control input-sm" type="text" value="'.$row['subjectname'].' - '.$row['description'].'" />
            </div>
            <div class="form-group">
                <label>Student: </label>
                <input readonly name="txt_edit_stud" id="txt_edit_stud" class="form-control input-sm" type="text" value="'.$row['sname'].'" />
            </div>
            <div class="form-group">
                <label>Prelim: </label>
                <input name="txtprelim" id="txtprelim" class="form-control input-sm" type="number" value="'.$row['prelim'].'" />
            </div>
            <div class="form-group">
                <label>Midterm: </label>
                <input name="txtmidterm" id="txtmidterm" class="form-control input-sm" type="number" value="'.$row['midterm'].'" />
            </div>
            <div class="form-group">
                <label>Pre Final: </label>
                <input name="txtprefi" id="txtprefi" class="form-control input-sm" type="number" value="'.$row['prefi'].'" />
            </div>
            <div class="form-group">
                <label>Final: </label>
                <input name="txtfinal" id="txtfinal" class="form-control input-sm" type="number" value="'.$row['final'].'" />
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_update_studgrade" value="Save"/>
        </div>
    </div>
</div>
</form>
</div>';?>

