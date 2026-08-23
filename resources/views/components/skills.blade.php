<section id="skills" class="section skills">

    <div class="container">

        <div class="section-heading">

            <p class="section-label">
                Keahlian
            </p>

            <h2>
                Skills <span>Saya</span>
            </h2>

        </div>

        <div class="skills-grid">

            @forelse ($skills as $skill)

                <div class="skill-card">

                    @if($skill->icon)
                        <div class="skill-icon">
                            {{ $skill->icon }}
                        </div>
                    @endif

                    <h3>
                        {{ $skill->name }}
                    </h3>

                    @if($skill->category)
                        <p class="skill-category">
                            {{ $skill->category }}
                        </p>
                    @endif

                </div>

            @empty

                <p>
                    Belum ada skill.
                </p>

            @endforelse

        </div>

    </div>

</section>