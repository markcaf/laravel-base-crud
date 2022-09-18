<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" value="{{ old('title', $comic->title) }}" type="text" class="form-control" id="title" aria-describedby="titleHelp" required>
    <div id="titleHelp" class="form-text">Insert here your comic's title.</div>

    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $comic->description) }}</textarea>

    @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="thumb" class="form-label">Thumb image</label>
    <input name="thumb" value="{{ old('thumb', $comic->thumb) }}" type="text" class="form-control" id="thumb" aria-describedby="thumbHelp" required>
    <div id="thumbHelp" class="form-text">Insert here your thumb image by writing the URL.</div>

    @error('thumb')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input name="price" value="{{ old('price', $comic->price) }}" type="number" class="form-control" step="0.01" id="price" aria-describedby="priceHelp" required>
    <div id="priceHelp" class="form-text">Insert here the comic's price (es: 9.99)</div>

    @error('price')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="series" class="form-label">Series</label>
    <input name="series" value="{{ old('series', $comic->series) }}" type="text" class="form-control" id="series" aria-describedby="seriesHelp" required>
    <div id="seriesHelp" class="form-text">Insert here your comic's series. (es. action comics)</div>

    @error('series')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="sale-date" class="form-label">Sale Date</label>
    <input name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}" type="date" class="form-control" id="sale-date" aria-describedby="sale-dateHelp" required>
    <div id="sale-dateHelp" class="form-text">Insert here your comic's sale date.</div>

    @error('sale_date')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <select class="form-select" name="type" id="type" required >
        <option value="comic book" {{'comic book' == old('type', $comic->type) ? 'selected' : ''}}>Comic Book</option>
        <option value="graphic novel" {{'graphic novel' == old('type', $comic->type) ? 'selected' : ''}}>Graphic Novel</option>
        <option value="other" {{'other' == old('type', $comic->type) ? 'selected' : ''}}>Other</option>
    </select>
    <div id="typeHelp" class="form-text">Insert here your comic's type (es. comic book).</div>

    @error('type')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="text-center mt-5">
    <button type="submit" class="btn btn-lg btn-primary text-uppercase fw-bold">Submit comic</button>
</div>