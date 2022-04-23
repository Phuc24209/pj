<div id="myAddModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Thêm sản phẩm</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" id="form-add" method="POST" role="form" onsubmit="return validateProduct()" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="height: 50px">
                        <input type="text" class="form-control" placeholder="Tên sản phẩm" onchange="validateProduct()" name='name'
                            id="name">
                            <small id="errorname" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group" style="height: 50px">
                        <input type="text" class="form-control" placeholder="Mô tả" onchange="validateProduct()" name="descrip"
                            id="descrip">
                            <small id="errordescrip" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class=" row px-3">
                        <select class="form-select col" aria-label="" id='typename' onchange="validateProduct()" name='typename'>
                            <option selected>Loại sản phẩm</option>
                            @forelse ($allType as $itemType)
                                <option value='{{ $itemType->id }}'>{{ $itemType->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        
                        <div class='px-1'></div>
                        <select class="form-select col" aria-label="" id='brand' onchange="validateProduct()" name='brand'>
                            <option selected>Thương hiệu</option>
                            @forelse ($allBrand as $itemBrand)
                                <option value='{{ $itemBrand->id }}'>{{ $itemBrand->brand }}</option>
                            @empty
                            @endforelse
                        </select>
                        
                    </div>
                    <div class="form-group row px-3" style="height: 5px">
                        <small id="errortypename" style="height: 5px" class="text-danger"></small>
                        <small id="errorbrand" style="height: 5px;margin-left:90px" class="text-danger"></small>
                    </div>
                    <div class="form-group col px-3" style="height: 50px">
                        <select class="form-select col" aria-label="" id='supplier' onchange="validateProduct()" name='supplier'>
                            <option selected>Nhà cung cấp</option>
                            @forelse ($allSupplier as $itemSuplier)
                                <option value='{{ $itemSuplier->id }}'>{{ $itemSuplier->name }}</option>
                            @empty
                            @endforelse
                        </select> 
                        <small id="errorsupplier" style="height: 5px" class="text-danger"></small>
                    </div>
                   
                    <div id='multiAttribute'>
                        <div class="w-100 text-center mb-2">--------------------- Thuộc tính ---------------------
                        </div>
                        <div class="row px-3" style="height: 50px">
                            <select class="form-select col" aria-label="" id='color' onchange="validateProduct()" name='color1'>
                                <option selected>Màu sắc</option>
                                @forelse ($allColor as $itemColor)
                                    <option value='{{ $itemColor->id }}'>{{ $itemColor->color }}</option>
                                @empty
                                @endforelse
                            </select>
                            
                            <div class='px-3'></div>
                            <select class="form-select col" aria-label="" id='size' onchange="validateProduct()" name='size1'>
                                <option selected>Kích cỡ</option>
                                @forelse ($allSize as $itemSize)
                                    <option value='{{ $itemSize->id }}'>{{ $itemSize->size }}</option>
                                @empty
                                @endforelse
                            </select>
                            
                        </div>
                        <div class="form-group row px-3" style="height: 5px">
                            <small id="errorcolor" style="height: 5px" class="text-danger"></small>
                            <small id="errorsize" style="height: 5px;margin-left:150px" class="text-danger"></small>
                        </div>
                        <div class="row mt--2 px-2">
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Đơn giá (VNĐ)"
                                    onchange="validateProduct()" name="price1" id="price">
                                    <small id="errorprice" style="height: 5px" class="text-danger"></small>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Số lượng"
                                    onchange="validateProduct()" name="quantity1" id="quantity">
                                    <small id="errorquantity" style="height: 5px" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="btn btn-success btn-sm" style='margin-top:40px; margin-bottom: 20px' onclick="addMoreAttribute()">Add more</div> --}}

                    <div id='multiImg' name='multiImg'>
                        <div class="form-group row px-2">
                            <div class='col'>
                                <label for="exampleFormControlFile1">Chọn ảnh sản phẩm</label>
                                <input type="file" class="form-control-file" id="img1"
                                    name="img1">
                            </div>
                            {{-- onchange="openPicAdd(this)" --}}
                            {{-- <img src="" alt="" srcset="" id='imageDemoAdd' class='col'
                                style="width: auto;max-height: 100px"> --}}
                        </div>
                    </div>
                    {{-- <div class="btn btn-success btn-sm" style='margin-top:-10px; margin-bottom: 20px' onclick="addMoreImage()">Add more</div> --}}
                    
                    <input type="hidden" id='CountImg' name='countImg' value="1">
                    <input type="hidden" value="1" id='Count' name='count'>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    function addMoreAttribute() {
        const index = parseInt($('#Count').val()) + 1;
        const newAttribute =
                    `<div class="w-100 text-center mb-2">--------------------- Thuộc tính ${index} ---------------------
                        </div>
                        <div class="form-group row px-3">
                            <select class="form-select col" aria-label="" id='color' name='color${index}'>
                                <option selected>Màu sắc</option>
                                @forelse ($allColor as $itemColor)
                                    <option value='{{ $itemColor->id }}'>{{ $itemColor->color }}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class='px-3'></div>
                            <select class="form-select col" aria-label="" id='size' name='size${index}'>
                                <option selected>Kích cỡ</option>
                                @forelse ($allSize as $itemSize)
                                    <option value='{{ $itemSize->id }}'>{{ $itemSize->size }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group row mt--2">
                            <div class="form-group col">
                                <input type="number" class="form-control" placeholder="Đơn giá (VNĐ)"
                                    name="price${index}" id="price">
                            </div>
                            <div class="form-group col">
                                <input type="number" class="form-control" placeholder="Số lượng"
                                    name="quantity${index}" id="quantity">
                            </div>
                        </div>
                        <div class="flex justify-content-center align-items-center w-100">
                        </div>`;
        $( "#multiAttribute" ).append( newAttribute );
        $('#Count').val(index) ;
    }

    function addMoreImage() {
        const indexImg = parseInt($('#CountImg').val()) + 1;
        const newImage =
                    `<div class="form-group row">
                        <div class='col'>
                            <label for="exampleFormControlFile1">Chọn ảnh sản phẩm thứ ${indexImg}</label>
                            <input type="file" class="form-control-file" id="img${indexImg}"
                                name="img${indexImg}">
                        </div>
                        
                    </div>`;
        $( "#multiImg" ).append( newImage );
        $('#CountImg').val(indexImg) ;
    }
</script>
