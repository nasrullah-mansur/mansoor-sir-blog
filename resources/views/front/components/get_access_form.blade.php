<div class="subscriber-form">
    <h4 style="font-size: 24px; line-height: 34px; font-weight: 500;">
        {{ $title }}
    </h4>
    <p class="text-centr text-danger">Sign up to get your access</p>
    <form action="{{ route('subscriber.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your name">
        @if ($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif
        <input type="email" name="email" placeholder="Email">
        @if ($errors->has('email'))
        <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif

        <input type="hidden" name="access" value="get access">
        <input type="hidden" name="drive_link" value="{{ $drive_link }}">
        <button type="submit">Get Access</button>
        
    </form>
</div>