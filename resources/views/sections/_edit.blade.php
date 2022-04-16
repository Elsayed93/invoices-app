<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">تعديل قسم</h6>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('sections.store') }}" method="post">
        <div class="modal-body">
            @csrf

            <div class="form-group">
                <label for="">إسم القسم</label>
                <input type="text" name="name" id="" class="form-control" placeholder="من فضلك قم بكتابة إسم القسم">
            </div>


            <div class="form-group">
                <label for="">الوصف</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"
                    placeholder="قم بكتابة وصف القسم(إختياري)"></textarea>
            </div>


        </div>
        <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit">إضافة</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
        </div>
    </form>
</div>
