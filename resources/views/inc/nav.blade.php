<header>
    

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="/dashboard">PIMS</a>
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active management">
                  <a class="nav-link " >Management</a>
                  <ul class="customNave">
                        <li id="dispProducts"><a href="/products">Products</a>
                          <ul class="customNave2">
                              <li style="display:block;"><a href="/products/create">Order For Product</a></li>
                              <li><a href="/products">View Products</a></li>
                            </ul>
                        </li>
                        <li id="dispStores"><a href="/stores">Stores</a>
                          <ul class="customNave3">
                              <li style="display:block;"><a href="/stores/create">Add Store</a></li>
                              <li><a href="/stores">View Stores</a></li>
                              </ul>
                        </li>
                        <li id="dispPTypes"><a href="/productTypes">Product Type</a>
                          <ul class="customNave4">
                              <li style="display:block;"><a href="/productTypes/create">Add Product Type</a></li>
                              <li><a href="/productTypes">View Product Types</a></li>
                              </ul>
                        </li>
                        </li>
                        <li id="dispPCat"><a href="/productCategories">Product Category</a>
                          <ul class="customNave5">
                              <li style="display:block;"><a href="/productCategories/create">Add Product Category</a></li>
                              <li><a href="/productCategories">View Product Category</a></li>
                              </ul>
                        </li>
                        <li id="dispApprove">
                          <a href="/approve">Approve Transfer
                        </li>
                      </ul>
                </li>
                
                <li class="nav-item active">
                  <a class="nav-link" href="/sales/create">Sales</a>
                </li>
                <li class="nav-item active moreActionMenu">
                  <a class="nav-link" >More Actions</a>
                  <ul class="moreAction">
                        <li><a href="/monthlySales/create">Monthly Sales Report</a></li>
                        <li><a href="/dailySales/create">Daily Sales Report</a></li>
                        <li><a href="">Sales By Drugs</a></li>
                        <li><a href="/products">View Products</a></li>
                      </ul>
                </li>
              </ul>
              {{--  <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>  --}}
              <ul class="navbar-nav  mt-2 mt-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Logout <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/addUser">Register<span class="sr-only">(current)</span></a>
                  </li>
                </ul>
            </div>
          </nav>
</header>