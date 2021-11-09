{{-- Extends layout --}}
@extends('layout.custom')

@section('style')
<style>
 .employee-photo {
        display: inline-block;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background-size: 64px 64px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
        cursor: pointer;
    }

    .employee-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 22px;
        padding-left: 3px;
        cursor: pointer;
    }

    table {
        font-size: 1.5em;
    }

  .timeline-panel {
    align-items: center;
    width: 70%;
    border: 1px solid #999;
    margin-bottom: 1rem;
  }

  .timeline-panel img {
    max-width: 70px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .card-header .search-area {
    min-width: 60%;
  }

  .card-header .search-area .form-control {
    min-height: 75px;
  }

  .create-user, .edit-user {
      font-size : 1em;
      font-weight: normal;
  }

  .k-i-none {
      padding: 15px 15px;
  }
</style>
@endsection


{{-- Content --}}
@section('content')

<script src="{{ asset('vendor/kendo/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/kendo/js/kendo.all.min.js') }}" type="text/javascript"></script>

<div class="container-fluid">

  <!-- Nestable -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <form action="{{ url('/user/list') }}" method="GET" class="card-header">
          <h4 class="card-title">{{ $page_title }}</h4>
          <div class="input-group search-area ml-auto">
            <div class="input-group-append">
              <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
            </div>
            <input type="text" class="form-control" name="search_term" placeholder="Search here..." value="{{ $search_term }}" required>
          </div>
          <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form> --}}
        <button type="button" id="create_chlid_user" class="btn mr-2 btn-danger btn-lg">Add</button>
        <input type="hidden" id="parent_id" value="{{ Auth::user()->id }}" />

        <div class="card-body">
          <div class="card-content">

            <div id="treelist"></div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script id="template" type="text/x-kendo-template">
    <tr data-uid="#= data.model.uid #">
        <td>
            <input type="hidden" value="#: data.model.id #" />
            #for(var i = 0; i < (hasChildren ? level : (level + 1)); i++){#
                <span class="k-icon k-i-none"></span>
            #}#
            #if(data.hasChildren){#
                <span class="k-icon k-i-#=data.model.expanded? 'collapse' : 'expand'#"></span>
            #}#
            <div class='employee-photo'
                style='background-image: url(#: data.model.avatarUrl #);'></div>
            <div class='employee-name'><a>#: data.model.fullName #</a></div>
        </td>
        <td>
                <span class="nav-text">#: data.model.levelRole #</span>
        </td>
        <td>
                <span id='#: data.model.id #'>#: data.model.createdAt #</span>
        </td>
        <td>
            <div class="form-group">
                <button type="button" id="create_descendent_user" class="btn mr-2 btn-danger create-user" onclick="createNewUser(#: data.model.id #)">Add</button>
                <button type="button" id="edit_descendent_user" class="btn mr-2 btn-primary edit-user" onclick="editUser(#: data.model.id #)">Edit</button>
            </div>
        </td>
    </tr>
</script>
{{-- class='badgeTemplate' --}}
<script id="altRowTemplate" type="text/x-kendo-template">
    <tr data-uid="#= data.model.uid #" class="k-alt">
        <td>
            <input type="hidden" value="#: data.model.id #" />
            #for(var i = 0; i < (hasChildren ? level : (level + 1)); i++){#
                <span class="k-icon k-i-none"></span>
            #}#
            #if(data.hasChildren){#
                <span class="k-icon k-i-#=data.model.expanded? 'collapse' : 'expand'#"></span>
            #}#
            <div class='employee-photo'
                style='background-image: url(#: data.model.avatarUrl #);'></div>
            <div class='employee-name'><a>#: data.model.fullName #</a></div>
        </td>
        <td>
                <span class="nav-text">#: data.model.levelRole #</span>
        </td>
        <td>
                <span id='#: data.model.id #'>#: data.model.createdAt #</span>
        </td>
        <td>
            <div class="form-group">
                <button type="button" id="create_descendent_user" class="btn mr-2 btn-danger create-user" onclick="createNewUser(#: data.model.id #)">Add</button>
                <button type="button" id="edit_descendent_user" class="btn mr-2 btn-primary edit-user" onclick="editUser(#: data.model.id #)">Edit</button>
            </div>
        </td>
    </tr>
</script>

<script>
    $("#treelist").kendoTreeList({
        rowTemplate: kendo.template($("#template").html()),
        altRowTemplate: kendo.template($("#altRowTemplate").html()),
        columns: [
            { field: "Name", width: "300px" },
            { field: "Level Role", width: "100px" },
            { field: "Created At", width: "100px" },
            { field: "Action", width: "150px" }
        ],
        dataSource: {
            data: @json($users),
            schema: {
                model: {
                    id: "id",
                    expanded: true
                }
            }
        },
        dataBound: function (e) {
            var grid = this;
            grid.table.find("tr").each(function () {
                var dataItem = grid.dataItem(this);
                var additionalClass = getAdditionalClass(dataItem.id);

                $(this).find(".badgeTemplate").kendoBadge({
                    shape: 'pill',
                    fill: "outline",
                    size: "large",
                    themeColor: "inherit"
                }).addClass(additionalClass);;

                kendo.bind($(this), dataItem);
            });
        }
    });

    function getAdditionalClass(employeeId) {
        if (employeeId % 3 == 0) {
            return 'lengthOfServiceBlue';
        }
        else if (employeeId % 3 == 1) {
            return "lengthOfServiceGreen";
        }
        else {
            return "lengthOfServicePurple";
        }
    }
</script>

@endsection
