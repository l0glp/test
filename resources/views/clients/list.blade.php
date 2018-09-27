<div class="titleView">Clients list</div>

<div class="optionButton">
    <a href="{{route('clients.detail')}}">Add new client</a>
</div>
<table id="clientsTable" class="js-clientsTable" data-url="{{route('clients.update')}}">
    <thead>
        <tr>
            <th class="id"></th>
            <th class="name"></th>
            <th class="surname"></th>
            <th class="email"></th>
            <th class="address"></th>
            <th class="phone"></th>
            <th class="products"></th>
            <th class="actions"></th>
        </tr>
    </thead>
    <tbody>
        <tr></tr>
    </tbody>
</table>

<div class="list">
    @include('shared.backButton')
</div>