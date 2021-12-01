<div class="card text-white bg-primary ml-4" style="width: 45rem;">
    <div class="card-body">
        <h1 class="card-title">Alternatif</h1>
        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <table class="table text-white">
            <tr>
                <td>No</td>
                <td>Kode Alternatif</td>
                <td>Nama Alternatif</td>
                <td>Aksi</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </table>
        <a href="modalAdd" class="btn btn-light float-right" data-toggle="modal" data-target="#myModal">Add</a>
        <a href="#" class="btn btn-primary border-light float-right mr-2">Cancel</a>
    </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal Alternatif</h5>
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="kodeAlternatif" class="form-label">Kode Alternatif</label>
                <input type="email" class="form-control" id="kodeAlternatif" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="namaAlternatif" class="form-label">Nama Alternatif</label>
                <input type="password" class="form-control" id="namaAlternatif">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>