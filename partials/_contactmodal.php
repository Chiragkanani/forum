<!-- Modal -->
<div class="modal fade" id="contactmodal" tabindex="-1" aria-labelledby="contactmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactmodalLabel">Contact us!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




            <div class="modal-body">

                <form action="partials\_insert_contact.php" method="post">

                    <div class="mb-3">
                        <label for="username" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">

                    </div>

                    <div class="mb-3">
                        <label for="useremail" class="form-label"> Your Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mt-3">
                        <label for="number" class="form-label"> Your Phone Number</label>
                        <input type="number" class="form-control"  maxlength="10" name="number" id="number">
                    </div>
                    <div id="numberblock" class="form-text">
                      Make sure number must be 10 character!!
                    </div>

                    <div class="my-3">
                        <label for="contact_desc" class="form-label">Describe what you want to contact Us for
                            here</label>
                        <textarea class="form-control" id="contact_desc" rows="3" name="contactdesc"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>

        </div>



    </div>
</div>