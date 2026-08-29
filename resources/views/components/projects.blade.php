
<section id="projects" class="section projects">
    <div class="container">

        <div class="section-heading">
            <p class="section-label">Portfolio</p>

            <h2>
                Project <span>Saya</span>
            </h2>
        </div>

        <div class="projects-grid">

            @forelse ($projects as $project)

                <article class="project-card">

                    @if ($project->image)
                        <div class="project-image">
                            <img
                                src="{{ $project->image_url }}"
                                alt="{{ $project->title }}"
                            >
                        </div>
                    @endif

                    <div class="project-content">

                        @if ($project->featured)
                            <span class="project-badge">
                                Featured
                            </span>
                        @endif

                        <h3>{{ $project->title }}</h3>

                        <p>
                            {{ $project->description }}
                        </p>

                        <div class="project-links">

                            @if ($project->github_url)
                                <a
                                    href="{{ $project->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    GitHub
                                </a>
                            @endif

                            @if ($project->demo_url)
                                <a
                                    href="{{ $project->demo_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Live Demo
                                </a>
                            @endif

                        </div>

                    </div>

                </article>

            @empty

                <p>Belum ada project.</p>

            @endforelse

        </div>

    </div>
</section>