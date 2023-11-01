<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>https://tradefountain.co.uk</loc>
        <lastmod>2023-10-16T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>https://tradefountain.co.uk/#products</loc>
        <lastmod>2023-10-16T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>

    <url>
        <loc>https://tradefountain.co.uk/products</loc>
        <lastmod>2023-10-26T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>

    <url>
        <loc>https://tradefountain.co.uk/terms-of-service</loc>
        <lastmod>2023-10-16T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>

    <url>
        <loc>https://tradefountain.co.uk/privacy-policy</loc>
        <lastmod>2023-10-16T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>

    <url>
        <loc>https://tradefountain.co.uk/about</loc>
        <lastmod>2023-10-31T05:05:00+05:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>


    @foreach ($products as $product)
        <url>
            <loc>{{ url('/') }}/product/{{ $product->slug }}</loc>
            <lastmod>{{ $product->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>