<div class="comment comment-section">
    <h3>Our Comment</h3>
    <ul>
        @forelse ($comments as $comment)
        <li>
            <div class="item">
                <div class="icon">
                    <i class="far fa-comment-alt"></i>
                </div>
                <div class="contant">
                    <div class="title">
                        <h4>{{ $comment->name }} <a data-pid="{{ $comment->id }}" href="#"><i class="fas fa-reply"></i></a> </h4>
                        <span>{{ $comment->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="text">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            </div>
            @if (count($comment->replies) > 0)
                <ul>
                    @foreach ($comment->replies as $reply)
                    <li>
                        <div class="item">
                            <div class="icon">
                                <i class="far fa-comment-alt"></i>
                            </div>
                            <div class="contant">
                                <div class="title">
                                    <h4>{{ $reply->name }} @if($loop->last) <a data-pid="{{ $comment->id }}" href="#"><i class="fas fa-reply"></i></a> @endif</h4>
                                    <span>{{ $reply->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="text">
                                    <p>{{ $reply->comment }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
        @empty
            <p>No comment found</p>
        @endforelse
        
        
    </ul>

    <h3 class="comment-title" id="comment-form">
        <span id="reply-text">Leave a reply</span> 
        <a id="close-reply" href="#"><i class="fas fa-times"></i></a>
    </h3>
    <div class="comment-form">
        <form action="{{ $route }}" method="POST">
            @csrf
            <div class="text">
                <textarea name="comment" placeholder="Write your text here..."></textarea>
                @if ($errors->has('comment'))
                    <small class="error-msg">{{ $errors->first('comment') }}</small>
                @endif
            </div>
            <div class="inputs">
                <div class="input-box">
                    <input value="{{ Session::has('comment_username') ? Session::get('comment_username') : '' }}" type="text" name="name" placeholder="Your name">
                    @if ($errors->has('name'))
                    <small class="error-msg">{{ $errors->first('name') }}</small>
                @endif
                </div>
                <div class="input-box">
                    <input value="{{ Session::has('comment_username') ? Session::get('comment_email') : '' }}" type="email" name="email" placeholder="Your email">
                    @if ($errors->has('email'))
                    <small class="error-msg">{{ $errors->first('email') }}</small>
                @endif
                </div>
            </div>

            <div class="submit pb-3">
                <input type="hidden" id="pid" name="p_id" value="0">
                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                <button type="submit">Post Comment</button>
            </div>
            
        </form>
    </div>
</div>

<div class="comment-alert">
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Something went wrong, Please try again. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done</strong> Your comment has been sent successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>