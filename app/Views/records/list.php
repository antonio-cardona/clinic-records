<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic Records App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>

<body>
    <div class="container"><br /><br />
        <div class="row">
            <div class="col-lg-10">
                <h2>Clinic Records</h2>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Clinic Record
                </button>
            </div>
        </div>

        <table class="table table-bordered table-striped" id="clinicrecordTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>Height (Cm)</th>
                    <th>Weight (Kg)</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($records_detail as $row) {
                    ?>
                    <tr id="<?php echo $row['id']; ?>">
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['birthdate']; ?>
                        </td>
                        <td>
                            <?php echo $row['sex']; ?>
                        </td>
                        <td>
                            <?php echo $row['height']; ?>
                        </td>
                        <td>
                            <?php echo $row['weight']; ?>
                        </td>
                        <td>
                            <?php echo $row['created_at']; ?>
                        </td>
                        <td>
                            <?php echo $row['updated_at']; ?>
                        </td>
                        <td>
                            <a type="button" data-id="<?php echo $row['id']; ?>" class="btn btn-info btnDetail"
                                data-bs-toggle="modal" data-bs-target="#detailModal">
                                Detail Info
                            </a>
                            <a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                            <a data-id="<?php echo $row['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Add New Clinic Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addClinicrecord" name="addClinicrecord"
                        action="<?php echo site_url('clinic-records/save'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtFullName">Full Name:</label>
                                <input type="text" class="form-control" id="txtFullName" placeholder="Enter Full Name"
                                    name="txtFullName">
                            </div>
                            <div class="form-group">
                                <label for="txtBirthdate">Date of Birth:</label>
                                <input type="date" class="form-control" id="txtBirthdate"
                                    placeholder="Enter Date of Birth" name="txtBirthdate">
                            </div>
                            <div class="form-group">
                                <label for="txtSex">Sex:</label>
                                <select class="form-select" id="txtSex" name="txtSex">
                                    <option selected value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtHeight">Height (Cm):</label>
                                <input type="number" class="form-control" id="txtHeight" placeholder="Enter Height"
                                    name="txtHeight" min="1" max="1000000">
                            </div>
                            <div class="form-group">
                                <label for="txtWeight">Weight (Kg):</label>
                                <input type="number" class="form-control" id="txtWeight" placeholder="Enter Weight"
                                    name="txtWeight" min="0" max="500" step="0.1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Update Clinic Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateClinicrecord" name="updateClinicrecord"
                        action="<?php echo site_url('clinic-records/update'); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="hdnClinicrecordId" id="hdnClinicrecordId" />
                            <div class="form-group">
                                <label for="txtFullName">Full Name:</label>
                                <input type="text" class="form-control" id="txtFullName" placeholder="Enter Full Name"
                                    name="txtFullName">
                            </div>
                            <div class="form-group">
                                <label for="txtBirthdate">Date of Birth:</label>
                                <input type="text" class="form-control" id="txtBirthdate" placeholder="Date of Birth"
                                    name="txtBirthdate">
                            </div>
                            <div class="form-group">
                                <label for="txtSex">Sex:</label>
                                <select class="form-select" id="txtSex" name="txtSex">
                                    <option selected value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtHeight">Height (Cm):</label>
                                <input type="number" class="form-control" id="txtHeight" placeholder="Enter Height"
                                    name="txtHeight" min="1" max="1000000">
                            </div>
                            <div class="form-group">
                                <label for="txtWeight">Weight (Kg):</label>
                                <input type="number" class="form-control" id="txtWeight" placeholder="Enter Weight"
                                    name="txtWeight" min="0" max="500" step="0.1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Detailed Clinic Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="detailClinicrecord" name="detailClinicrecord"
                        action="<?php echo site_url('clinic-records/detail'); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="hdnClinicrecordId" id="hdnClinicrecordId" />
                            <div class="form-group">
                                <label for="txtFullNameDetail">Full Name:</label>
                                <input type="text" class="form-control" id="txtFullNameDetail" name="txtFullNameDetail"
                                    disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtBirthdate">Date of Birth:</label>
                                <input type="text" class="form-control" id="txtBirthdate" name="txtBirthdate" disabled
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtSex">Sex:</label>
                                <input type="text" class="form-control" id="txtSex" name="txtSex" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtHeight">Height (Cm):</label>
                                <input type="text" class="form-control" id="txtHeight" name="txtHeight" disabled
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtWeight">Weight (Kg):</label>
                                <input type="text" class="form-control" id="txtWeight" name="txtWeight" disabled
                                    readonly>
                            </div>
                            <div class="form-group">
                                <h5>Recommendation:</h5>
                                <blockquote class="blockquote" id="txtRecommendation">
                                    <p></p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Shared rules.
            const validation_rules = {
                txtFullName: "required",
                txtBirthdate: "required",
                txtSex: "required",
                txtHeight: "required",
                txtWeight: "required"
            };

            $('#clinicrecordTable').DataTable();

            $("#addClinicrecord").validate({
                rules: validation_rules,
                messages: {
                },

                submitHandler: function (form) {
                    var form_action = $("#addClinicrecord").attr("action");
                    $.ajax({
                        data: $('#addClinicrecord').serialize(),
                        url: form_action,
                        type: "POST",
                        dataType: 'json',
                        success: function (res) {
                            $('#addModal').modal('hide');
                            window.location.href = "/clinic-records/";
                        },
                        error: function (data) {
                        }
                    });
                }
            });

            $('body').on('click', '.btnDetail', function () {
                var clinicrecord_id = $(this).attr('data-id');
                $.ajax({
                    url: 'clinic-records/detail/' + clinicrecord_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $('#detailModal').modal('show');
                        $('#detailClinicrecord #hdnClinicrecordId').val(res.data.id);
                        $('#detailClinicrecord #txtFullNameDetail').val(res.data.name);
                        $('#detailClinicrecord #txtBirthdate').val(res.data.birthdate);
                        $('#detailClinicrecord #txtSex').val(res.data.sex);
                        $('#detailClinicrecord #txtHeight').val(res.data.height);
                        $('#detailClinicrecord #txtWeight').val(res.data.weight);
                        $('#detailClinicrecord #txtRecommendation').html(res.data.recommendation_text);
                    },
                    error: function (data) {
                    }
                });
            });

            $('body').on('click', '.btnEdit', function () {
                var clinicrecord_id = $(this).attr('data-id');
                $.ajax({
                    url: 'clinic-records/edit/' + clinicrecord_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $('#updateModal').modal('show');
                        $('#updateClinicrecord #hdnClinicrecordId').val(res.data.id);
                        $('#updateClinicrecord #txtFullName').val(res.data.name);
                        $('#updateClinicrecord #txtBirthdate').val(res.data.birthdate);
                        $('#updateClinicrecord #txtSex').val(res.data.sex);
                        $('#updateClinicrecord #txtHeight').val(res.data.height);
                        $('#updateClinicrecord #txtWeight').val(res.data.weight);
                    },
                    error: function (data) {
                    }
                });
            });

            $("#updateClinicrecord").validate({
                rules: validation_rules,
                messages: {
                },
                submitHandler: function (form) {
                    var form_action = $("#updateClinicrecord").attr("action");
                    $.ajax({
                        data: $('#updateClinicrecord').serialize(),
                        url: form_action,
                        type: "POST",
                        dataType: 'json',
                        success: function (res) {
                            $('#updateModal').modal('hide');
                            window.location.href = "/clinic-records/";
                        },
                        error: function (data) {
                        }
                    });
                }
            });

            $('body').on('click', '.btnDelete', function () {
                var clinicrecord_id = $(this).attr('data-id');
                $.get('clinic-records/delete/' + clinicrecord_id, function (data) {
                    window.location.href = "/clinic-records/";
                })
            });
        });   
    </script>
</body>

</html>