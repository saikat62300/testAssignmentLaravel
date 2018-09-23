@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<form role="form" id="coupon_form" method="post" action="<?php echo $isNew == 'yes' ? URL::to('addFlim') : URL::to('updateFlim').'?id='.$flimModel->id; ?>">
    {{ csrf_field() }}
    <?php
    if ($isNew == 'no'):
        ?>
        <input type="hidden" name="id" value="<?php echo $flimModel->id; ?>">
    <?php endif; ?>
    <div class="form-body">
        <div class="form-group form-md-line-input">
            <label for="form_control_1">Slug<span class="required">*</span></label>
            {{Form::text('slug', $flimModel->slug, array('class'=>"form-control",'id'=>"Flim_slug", 'placeholder'=> "Enter the flim slug here."))}}
            <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
            <label for="form_control_1">Name<span class="required">*</span></label>
            {{Form::text('name', $flimModel->name, array('class'=>"form-control",'id'=>"Flim_name", 'placeholder'=> "Enter the flim name here."))}}
            <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
            <label for="form_control_1">Description<span class="required">*</span></label>
            {{Form::textarea('description',$flimModel->description, array('class'=>"form-control",'id'=>"Flim_description", 'placeholder'=> "Enter the description here.."))}}
            <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
                <label for="form_control_1">Realease Date<span class="required">*</span></label>
                {{Form::date('realease_date', $flimModel->realease_date, array('class'=>"form-control",'id'=>"Flim_realease_date", 'placeholder'=> "Enter the release date here."))}}
                <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
                    <label for="form_control_1">Rating<span class="required">*</span></label>
                    {{Form::number('rating', $flimModel->rating, array('class'=>"form-control",'min'=>1,'max'=>5,'id'=>"Flim_rating", 'placeholder'=> "Enter the rating here."))}}
                    <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
                <label for="form_control_1">Ticket Price<span class="required">*</span></label>
                {{Form::number('ticket_price', $flimModel->ticket_price, array('class'=>"form-control",'min'=>1,'id'=>"Flim_ticket_price", 'placeholder'=> "Enter the flim ticket price here."))}}
                <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
                <label for="form_control_1">Country<span class="required">*</span></label>
                {{Form::text('country', $flimModel->country, array('class'=>"form-control",'id'=>"Flim_country", 'placeholder'=> "Enter the flim country here."))}}
                <span class="error"></span>
        </div>
        <div class="form-group form-md-line-input">
                <label for="form_control_1">Genre<span class="required">*</span></label>
                {{Form::text('genre', $flimGenreModel->genre, array('class'=>"form-control",'id'=>"FlimGenre_genre", 'placeholder'=> "Enter the flim genres here by comma seperated. Eg. Drama, Horror"))}}
                <span class="error"></span>
        </div>
    </div>
    <div class="form-actions noborder">
        <button type="submit" id="submit_btn" class="btn btn-primary"><?php echo $isNew == 'yes' ? 'Create' : 'Save'; ?></button>
        <a href="{{ URL::to('manageFlims') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
$(document).ready(function () {
    $('#coupon_form').validate({// initialize the plugin
        rules: {
            slug: {
                required: true
            },
            name: {
                required: true
            },
            description: {
                required: true
            },
            realease_date: {
                required: true
            },
            rating: {
                required: true,
                minlength:1,
                maxlength:1,
            },
            ticket_price: {
                required: true
            },
            country: {
                required: true
            }
            genre: {
                required: true
            }
        },
        messages: {
            slug: "Slug can not be blank!",
            name: "Name can not be blank!",
            description: "Description can not be blank!",
            realease_date: "Realease Date can not be blank!",
            rating: {
                required: "Rating can not be blank!",
                maxlength: "only 1 digit allowed"
            },
            ticket_price: "Ticket Price can not be blank!",
            country: "Country can not be blank!",
            genre: "Genre can not be blank!"
        },
        errorElement: 'div',
        errorLabelContainer: '.errorTxt'
    });
});

</script>

