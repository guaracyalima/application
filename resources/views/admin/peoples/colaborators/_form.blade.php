@include('admin.peoples.colaborators.components._names')
@include('admin.peoples.colaborators.components._identification')
@include('admin.peoples.colaborators.components._occupation')
<div class="row">
    @include('admin.peoples.colaborators.components._sex')
</div>

@include('admin.peoples.colaborators.components._voter_dates')
@include('admin.peoples.colaborators.components._address')
@include('admin.peoples.colaborators.components._leads')
@include('admin.peoples.colaborators.components._salary')
@include('admin.peoples.colaborators.components._contact')
@include('admin.peoples.colaborators.components._observations')

<div class="row">
    <h3>Afialiado ao candidato</h3>
    @include('admin.peoples.colaborators.components._candidate')
</div>




