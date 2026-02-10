<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include jQuery and the Repeater Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!-- 2. jQuery Repeater Plugin -->

<!-- 3. Your custom JS (where the error occurs) -->
<script src="form.js"></script>

    <!-- 
      You will need to use the correct path to your 
      Metronic theme assets for the jquery.repeater plugin
      e.g., <script src="assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    -->
</head>
<body>
   <!--begin::Repeater-->
<div id="kt_docs_repeater_nested">
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="kt_docs_repeater_nested_outer">
            <div data-repeater-item>
                <div class="form-group row mb-5">
                    <div class="col-md-3">
                        <label class="form-label">Name:</label>
                        <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" />
                    </div>
                    <div class="col-md-3">
                        <div class="inner-repeater">
                            <div data-repeater-list="kt_docs_repeater_nested_inner" class="mb-5">
                                <div data-repeater-item>
                                    <label class="form-label">Number:</label>
                                    <div class="input-group pb-3">
                                        <input type="email" class="form-control" placeholder="Enter contact number" />
                                        <button class="border border-secondary btn btn-icon btn-flex btn-light-danger" data-repeater-delete type="button">
                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-flex btn-light-primary" data-repeater-create type="button">
                                <i class="ki-duotone ki-plus fs-5"></i>
                                Add Number
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:;" data-repeater-delete class="btn btn-flex btn-light-danger mt-3 mt-md-8">
                            <i class="ki-duotone ki-trash fs-5 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                            Delete Row
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-flex btn-light-primary" data-repeater-create type="button">
            <i class="ki-duotone ki-plus fs-5"></i>
            Add New Row
        </button>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->

</body>
    <script src="form.js"></script> 

</html>
