<h2>Ask a Question</h2>

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="/ask-question">
    @csrf

    <input
        type="text"
        name="name"
        placeholder="Your Name"
    >

    <input
        type="email"
        name="email"
        placeholder="Your Email"
    >
    <select name="category_id" class="select-modern" required>
        <option value="">
            Select Category
        </option>
    
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <textarea
        name="question"
        rows="5"
        required
        placeholder="Your question..."
    ></textarea>

    <button type="submit">
        Submit Question
    </button>
</form>