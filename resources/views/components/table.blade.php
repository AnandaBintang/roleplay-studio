<table class="table">
    <!-- head -->
    <thead>
        <tr>
            {{ $head }}
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
    <!-- foot -->
    <tfoot>
        <tr>
            {{ $foot }}
        </tr>
    </tfoot>
</table>
