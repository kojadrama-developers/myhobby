<div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="date">
                    </div>
                    <div class="form-check">
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="radio1" name="radio" value="Male" id="inlineRadio1"> Male
                        </label>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="radio2" name="radio" value="Female" id="inlineRadio2"> Female
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>