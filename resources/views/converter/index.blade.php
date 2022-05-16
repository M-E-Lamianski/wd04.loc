<form action="{{ route('converter.result') }}" method="post">
    @csrf
    <input name="amount" type="number"/>
    <select name="initial" class="form-control">
        <option value="BYN">BYN</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select>
    <select name="final" class="form-control">
        <option value="BYN">BYN</option>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select>
    <button type="submit">Result</button>
</form>
