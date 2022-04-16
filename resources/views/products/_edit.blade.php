<div class="modal-content editmodal-content">
    <div class="modal-header">
        <h6 class="modal-title">تعديل قسم</h6>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('sections.update', $product->id) }}" method="post">
        <div class="modal-body">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">إسم القسم</label>
                <input type="text" name="name" id="" class="form-control" placeholder="من فضلك قم بكتابة إسم القسم"
                    value="{{ $product->name }}">
            </div>


            <div class="form-group">
                <label for="">الوصف</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"
                    placeholder="قم بكتابة وصف القسم(إختياري)">{{ $product->description }}</textarea>
            </div>

            <select name="section_id" id="" class="form-control">
                <option value="">قم بإختيار القسم</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ $section->id == $product->section_id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit">تعديل</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
        </div>
    </form>
</div>
