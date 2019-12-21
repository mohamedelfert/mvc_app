<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Show Employees Information -->
    <div class="show_info" style="width: 90%;">

        <?php
        if (isset($_SESSION['success'])){
            echo $_SESSION['success'];
        }else if (isset($_SESSION['error'])){
            echo $_SESSION['success'];
        }
        session_unset();
        ?>

        <table class="table table-striped custab data">
            <thead>
                <legend style="background: #cad2ca;padding: 10px;text-align: center; margin-bottom: 10px;box-shadow: 0 0 8px #574E4E;"> <?= $text_employees_information ?> </legend>
                <a href="/employees/add" class="btn btn-primary btn-xs pull-right"><b>+</b> <?= $text_add_employee ?> </a>
                <tr>
                    <th> <?= $text_employee_name ?> </th>
                    <th> <?= $text_employee_age ?> </th>
                    <th> <?= $text_employee_address ?> </th>
                    <th> <?= $text_employee_salary ?> </th>
                    <th> <?= $text_employee_tax ?></th>
                    <th> <?= $text_options ?> </th>
                </tr>
            </thead>
            <tbody>

                <?php
                /** @var TYPE_NAME $employees */
                if (false !== $employees){
                    foreach($employees as $emp){
                        ?>
                        <tr>
                            <td><?= $emp->name?></td>
                            <td><?= $emp->age?></td>
                            <td><?= $emp->address?></td>
                            <td><?= $emp->calc_salary()?></td>
                            <td><?= $emp->tax?></td>
                            <td>
                                <a href="/employees/edit/<?= $emp->id ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                                <a href="/employees/delete/<?= $emp->id ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false"><i class="fa fa-trash" style="font-size:20px"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    ?>
                    <td colsapan="6"><p> <?= $text_no_employee_data ?> </p></td>
                    <?php
                }
                ?>

            </tbody>
        </table>

    </div>

</div>