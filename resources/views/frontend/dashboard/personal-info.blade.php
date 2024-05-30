<div class="fp_dash_personal_info">
    <h4>Parsonal Information
        <a class="dash_info_btn">
            <span class="edit">edit</span>
            <span class="cancel">cancel</span>
        </a>
    </h4>

    <div class="personal_info_text">
        <p><span>Name:</span> {{auth()->user()->name}}</p>
        <p><span>Email:</span> {{auth()->user()->email}}</p>
    </div>

    <div class="fp_dash_personal_info_edit comment_input p-0">
        <form action="{{route('profile.update')}}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12">
                    <div class="fp__comment_imput_single mt-3">
                        <input type="text" placeholder="Name" name="name"
                               value="{{auth()->user()->name}}">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 mt-3">
                    <div class="fp__comment_imput_single">
                        <input type="email" placeholder="Email" name="email"
                               value="{{auth()->user()->email}}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
