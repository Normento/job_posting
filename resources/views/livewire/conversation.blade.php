<div class="body">
    
    <h3 class="phrase">Mission:{{$conversation->emploie->title}}</h3>
    <div>
        @foreach ($conversation->messages as $message)
        <div class="{{$message->user_id == Auth::user()->id ? 'active':'desactive'}}">
            <p>{{$message->content}}</p>
        </div>

        @endforeach

        <!-- <textarea wire:keydown.enter.prevent="sendMessage" wire:model="message" name="" id="" cols="30" rows="10"></textarea> -->
        <div class="card-footer">
            <div class="input-group">
                <textarea class="form-control" id="form6Example7" rows="4" cols="150" wire:keydown.enter.prevent="sendMessage" wire:model="message" name="" class="form-control type_msg" placeholder="Message..."></textarea>

            </div>
        </div>
    </div>


</div>
<style>
    .active {
        margin-top: auto;
        margin-bottom: 10px;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
        width: 400px;


    }

    .desactive {
        margin-top: auto;
        margin-bottom: 10px;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
        width: 400px;
    }

    .body {
        margin-left: 200px;
    }

    .phrase {
        text-align: center;
        font-weight: bold;
        top: -20px;
    }
</style>
