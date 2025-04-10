<div>
    <section class="mb-4 space-y-2 ">
        <h1 class="text-2xl dark:border-zinc-700">{{ __('customers.title') }}</h1>
        <flux:separator />
    </section>




    <livewire:app.common.table listener='customerAdd' model="\App\Models\customers" :columns="[
        ['field' => 'name', 'label' => __('customers.customerName')],
        ['field' => 'email', 'label' => __('customers.customerEmail')],
        ['field' => 'phone', 'label' => __('customers.customerPhone')],
        ['field' => 'address', 'label' => __('customers.customerAddress')],
    ]" :filters="[
        ['field' => 'tenants_id', 'operator' => '=', 'value' => auth()->user()->tenants_id]
    ]" :title="__('customers.list')" detailsRouteName="app.customers.show" />
</div>