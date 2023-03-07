<!-- Edit Modal -->
    
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Catatan</h5>
                    <!-- <?php echo '\''.$_SESSION['username']."'"; ?> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Judul</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?php $user_data['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Teks</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>