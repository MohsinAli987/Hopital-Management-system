<section class="contact_section">
    <div class="container">
        <div class="row">
            <div class="custom_heading-container ">
                <h2>
                    Request A call back
                </h2>
            </div>
        </div>
    </div>
    <div class="container layout_padding2">
        <div class="row">
            <div class="col-md-5">
                <div class="form_contaier">
                    <form method="POST" action="request_a_call_back_for_medicine">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input readonly required name="name" value="{{Auth()->user()->name}}" type="text" class="form-control" id="exampleInputName1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNumber1">Phone Number</label>
                            <input readonly required name="phone_number" value="{{Auth()->user()->phone}}" type="number" class="form-control" id="exampleInputNumber1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input readonly required name="email" value="{{Auth()->user()->email}}" type="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group ">
                            <label for="inputState">Select medicine</label>
                            <select name="medicine" id="inputState" class="form-control">

                                <option value="no_selected" selected hidden>--Select Medicine--</option>
                                @foreach($data as $medicine)
                                <option value="{{$medicine->name}}">{{$medicine->name}}</option>
                                @endforeach
                                <!-- <option >Medicine 3</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMessage">Message</label>
                            <input name="message" type="text" class="form-control" id="exampleInputMessage">
                        </div>
                        <button type="submit" class="">Send</button>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="detail-box">
                    <h3>
                        Get Now Medicines
                    </h3>
                    <p>
                        We Guarantee an Increase In Collections. Experienced Staff - Contact Us Today! Easy-to-Use Reports. Certified Coders on Staff. Guaranteed Results. 100% US-based. Services: Proven Track Record, Complete Transparency, Guaranteed Results, Complete Solution, Best Technology.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
