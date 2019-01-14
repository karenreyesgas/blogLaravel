<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@empty ($admin) 
    @empty($articles)
        @empty( $slug)
                <h1> Bienvenue </h1>
                <a href="/blog">Blog</a>
                <a href="/admin">Admin</a>
        @else
                <h1>Welcome to the article : <?php echo e($slug) ?></h1>
                <p>{{ $text }}</p>
                <a href="/blog">Return</a>
        @endempty
    @else
        <h1>Welcome here is the blog</h1>
        @foreach ($articles as $article)
            <li><a href="/blog/{{ $article }}">{{ $article }}</a></li>
        @endforeach 
        <a href="/">Return</a>
        @endempty
@else
    <h1> Welcome admin </h1>
    <a href="/admin/blog">Blog</a>
    <a href="/">Menu</a>
    @if (! empty($articles))
        @php ($i = 1)
                @foreach ($articles as $article)
                        <li>{{ $article }}<a href="/admin/blog/{{ $i }}/edit"> edit</a></li>
                @php ($i++)
                @endforeach 
                <a href="/admin">Return</a>
    @endif
    @if (! empty($slug) && ! empty($id))
            <h1> Article</h1>
            <div id="msg"></div>
            <form id="change">
            <h3>Title : <input id="title"type="text" value="<?php echo e($slug) ?>"/></h3>
            <h3>Text : <textarea id="text" rows="4" cols="50"> {{ $text }} </textarea></h3>
            <input id="enviar" type="submit" value="SEND"/>
            </form>
            
    @endif
@endempty
<script>

$("#change").submit(function(event){
    event.preventDefault();
    var $form = $(this);

    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);

    request = $.ajax({
        url: "/admin/blog/{{$id}}/edit",
        type: "GET",
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR){
        $("#msg").html("Good");
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    request.always(function () {

        $inputs.prop("disabled", false);
    });

});
</script>

