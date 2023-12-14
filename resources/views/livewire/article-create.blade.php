<div>
    {{-- Be like water. --}}
    <div class="container">
        <div class="row justify-content-center">
            <div
                class="col-9 col-md-8 col-lg-6 d-flex flex-column align-items-center my-5 box shadow-custom rounded-5 ">
                <div>
                    <h2 class=" text-center my-4">{{__('ui.sellTitle')}}<br> {{__('ui.sellSubTitle')}}</h2>
                </div>
                @if (session('message'))
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @endif




                <form class="w-100" wire:submit='store' enctype="multipart/form-data">

                    <div class="my-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="name" class="form-label d-flex justify-content-center">{{__('ui.sellProducts')}}</label>
                        <input type="text" wire:model.blur="name"
                            class="form-control form-control-custom @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="brand" class="form-label d-flex justify-content-center">{{__('ui.describe')}}</label>
                        <input type="text" wire:model.blur="brand"
                            class="form-control form-control-custom @error('brand') is-invalid @enderror"
                            id="brand">
                        @error('brand')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="longDescription" class="form-label d-flex justify-content-center">{{__('ui.information')}}</label>
                        <textarea class="form-control form-control-custom @error('longDescription') is-invalid @enderror"
                            wire:model.blur="longDescription" id="longDescription" cols="30" rows="10"></textarea>

                        @error('longDescription')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="price" class="form-label d-flex justify-content-center">{{__('ui.price')}}</label>
                        <input type="number" min="0.01" max="99999.99" step="0.01" wire:model.blur="price"
                            class="form-control form-control-custom @error('price') is-invalid @enderror"
                            id="price">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3 w-100 d-flex flex-column align-items-center justify-content-center">
                        <label for="category" class="form-label d-flex justify-content-center">{{__('ui.addCategory')}}</label>
                        <select wire:model.blur="category"
                            id=" category"class="form-select form-select-custom @error('category') is-invalid @enderror"
                            aria-label="Default select example">
                            <option selected>{{__('ui.categoriesName')}}</option>

                            @foreach ($categories as $category)
                                <option value=" {{ $category->id }} "> {{__('ui.'.$category->name )}} </option>
                            @endforeach
                        </select>
                        @error('category')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center justify-content-center">
                        <label for="img" class="form-label d-flex justify-content-center">{{__('ui.image')}}</label>
                        <input type="file" name="images" wire:model="temporary_images" multiple
                             class="form-control form-control-custom @error('temporary-images.*') is-invalid @enderror" id="img">
                        @error('temporary_images.*')
                            {{ $message }}
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12 text-center ">
                                <p>{{__('ui.preview')}}</p>
                            </div>
                        </div>
                            <div class="row justify-content-center">
                                @foreach ($images as $key=>$image)
                                    <div class="col-11 my-3">
                                        <div class="img-preview mx-auto shadow rounded"
                                            style="background-image: url({{ $image->temporaryUrl() }}); background-repeat:no-repeat"></div>
                                        <button type="button"
                                            class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                            wire:click="removeImage({{ $key }})">{{__('ui.delete')}}</button>
                                    </div>
                                @endforeach
                            </div>
                    @endif
                    <div class="text-center mt-5">
                        <button type="submit" class="btn button-28-custom">{{__('ui.sell')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
