<script>
@foreach (serviceCategoryList() as $key => $item)


$('table').on('click', 'input[type="button"]', function (e) {
    $(this).closest('tr').remove()
  });

  $('table').on('click', '.removes-row', function (e) {
    $(this).closest('tr').remove()
  });

  $(".cast_est_btn").on("click", function () {
    $(this).addClass('active');
    RefreshTable();
  });

  function RefreshTable() {
    $("#load_tables").load("index.php #table_content");
  }

  function BindEvents() {
    $('#myTable{{$key+1}}').on('click', '.delete_button', function (e) {
      $(this).closest('tr').remove()
    });
  }

  $('table#myTable{{$key+1}}').on('click', '.edit_button', function (e) {
    $(this).closest('tr').addClass('active');
  });

  $('table#myTable{{$key+1}}').on('click', '.update_button', function (e) {
    $(this).closest('tr').removeClass('active');
  });
  //
  const addClassToTr = (table, className = "added") => {
    const trs = table.querySelectorAll("tr");
    trs.forEach(tr => {
      tr.classList.add(className);
    })
  }
  //

  function addRow() {
    var table{{ $key+1 }} = document.getElementById("myTable{{$key+1}}");
    addClassToTr(table{{ $key+1 }}, "name");

    var row = table{{ $key+1 }}.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Domain</label>
                          </div>
                          <select class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
                            <option value="" selected="">Select Domain</option> <option value="Rack Mounting"> Rack Mounting </option>
                            <option value="Operating System"> Operating System </option> <option value="Database"> Database </option>
                            <option value="Virtualization"> Virtualization </option> <option value="Router"> Router </option>
                            <option value="Switch"> Switch </option> <option value="Firewall"> Firewall </option>
                            <option value="Backup"> Backup </option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>`;
    cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Domain</label>
                          </div>
                          <select class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">
                            <option value="" selected="">Select Sub Domain</option>
                            <option value="Windows Server Edition">Windows Server Edition </option>
                            <option value="Oracle Solaris"> Oracle Solaris</option> <option value="Oracle Solaris"> MS SQL</option>
                            <option value="Oracle Solaris"> Mari DB</option> <option value="Oracle Solaris"> Post Gress</option>
                            <option value="Oracle Solaris"> VMware</option> <option value="Oracle Solaris"> RedHat RHEV</option>
                            <option value="Oracle Solaris"> Microsoft Hyper-V</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>`;
    cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Select Activity</label>
                          </div>
                            <select class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="" fdprocessedid="iylvk7">
                              <option value="" selected=""> Select Activity </option>
                              <option value="staticWebsite">Static Website</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                        </div>`;
    cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Activity Type</label>
                          </div>
                          <select class="form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"
                            id="validationCustom04" required="">
                            <option value="" selected=""> Activity Type</option>
                            <option value="Rack Mounting"> On-Site </option>
                            <option value="Operating System"> Off-Site </option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>`;
    cell5.innerHTML = `<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Domain</label>
                          </div>
                          <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>`;
    cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">
                        <div class="d-flex justify-content-around">
                          <div class="tab-domain me-2">
                            <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <label for="">Qty</label>
                          </div>
                          <input type="number" class="form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>`;
    cell7.innerHTML = `<div class="d-flex w-160 justify-content-end">
                        <button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>
                        <input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete">
                        <button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>
                      </div>`;
  };

  $(".show-my-estimate{{ $key+1 }}").click(function () {
    $(".box-type-estimate4").toggle();
  });

  @endforeach
</script>

