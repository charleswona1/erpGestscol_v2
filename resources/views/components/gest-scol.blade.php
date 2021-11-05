<x-app  :title="$title ?? ''" :page-title="$pageTitle ??  $title ?? ''">
    {{ $slot ?? '' }}
    {{ $javascripts ?? '' }}
</x-app>