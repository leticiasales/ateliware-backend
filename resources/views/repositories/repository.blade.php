<ul class="list-unstyled">
    <li id="header-list" class="list-group-item-info">id: {{ ($repo->id) }} - name: {{ ($repo->name) }}</li>
    <div id="info">
        <li>git_id: {{ ($repo->git_id) }}</li>
        <li>name: {{ ($repo->name) }}</li>
        <li>language: {{ ($repo->language) }}</li>
        <li>html_url: {{ ($repo->html_url) }}</li>
        <li>subscription_url: {{ ($repo->subscription_url) }}</li>
        <li>private: {{ ($repo->private) }}</li>
        <li>description: {{ ($repo->description) }}</li>
        <li>stargazers_count: {{ ($repo->stargazers_count) }}</li>
        <li>open_issues: {{ ($repo->open_issues) }}</li>
        <li>forks_count: {{ ($repo->forks_count) }}</li>
        <li>owner_id: {{ ($repo->owner_id) }}</li>
        <li>created_at: {{ ($repo->created_at) }}</li>
        <li>updated_at: {{ ($repo->updated_at) }}</li>
    </div>
</ul>