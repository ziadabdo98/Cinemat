<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card mx-auto p-3">
                <form class="card-details ">
                    <div class="form-group mb-3 mt=3">
                        <p class="text-warning mb-0">Card Number</p> <input type="text" name="card-num" placeholder="1234 5678 9012 3457" size="17" id="cno" minlength="19" maxlength="19">
                        <p id="card-number-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <p class="text-warning mb-0">Cardholder's Name</p> <input type="text" name="name" placeholder="Name" size="17">
                        <p id="card-name-error" class="text-danger"></p>
                    </div>
                    <div class="form-group pt-2">
                        <div class="row d-flex">
                            <div class="col-6">
                                <p class="text-warning mb-0">Expiration</p> <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7">
                                <p id="exp-error" class="text-danger"></p>
                            </div>
                            <div class="col-6">
                                <p class="text-warning mb-0">Cvv</p> <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3">
                                <p id="cvv-error" class="text-danger"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>