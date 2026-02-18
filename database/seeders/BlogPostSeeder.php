<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        BlogPost::updateOrCreate(
            ['slug' => 'ai-digital-twins-rehearse-surgery'],
            [
                'title' => 'AI “Digital Twins” Rehearse Surgery Before the Real Case',
                'category' => 'cardiology',
                'tags' => ['Surgery', 'Cardiology'],
                'author_name' => 'Med Open Press Editorial',
                'excerpt' => 'A plain-language look at patient-specific simulation in procedural planning—what it can help teams test, and where guardrails still matter.',
                'content' => "Scientific News highlights how modern simulation and modeling can help clinical teams plan complex procedures.\n\nOne emerging approach is the “digital twin”: a patient-specific model built from clinical data (often imaging) that supports structured “what-if” exploration before a case begins.\n\nThese tools are not meant to replace clinical judgment. Their value is in making planning more testable—helping teams compare strategies, anticipate constraints, and align around a shared plan.",

                // Leave image paths null to use the template's default assets.
                'hero_image_path' => null,
                'author_image_path' => null,

                'detail_title_2' => 'What a Digital Twin Can Do',
                'detail_text_2' => 'These tools are not meant to replace clinical judgment. Their value is in making planning more testable—helping teams compare strategies, anticipate constraints, and align around a shared plan.',
                'detail_text_3' => 'In practice, a useful digital twin goes beyond a 3D visualization. It may combine anatomy with simulation to estimate how flow, geometry, or devices might behave under different assumptions.',
                'detail_text_4' => 'Because models depend on data quality and assumptions, results should be treated as decision support—helpful for discussion and preparation, not a guarantee.',

                'detail_title_3' => 'Where It Helps Clinicians',
                'detail_points' => [
                    'Scenario testing in procedural planning: compare strategies and device positioning before the day of surgery.',
                    'Risk anticipation: flag anatomy- or flow-related constraints that may affect sealing, obstruction risk, or access.',
                    'Team alignment: make assumptions explicit and reviewable, reducing surprises mid-case.',
                ],

                'detail_title_4' => 'Guardrails Still Matter',
                'detail_text_5' => 'Any predictive tool needs validation and clinical context. Teams still have to weigh uncertainty, limitations of the underlying data, and whether a simulated outcome maps to the real decision at hand.',

                'detail_quote_text' => '“Simulation doesn’t replace expertise—it helps teams explore more scenarios before real time runs out.”',
                'detail_quote_author_name' => 'Med Open Press Editorial',
                'detail_quote_author_image_path' => null,

                'detail_title_5' => 'From Planning to the Operating Room',
                'detail_text_6' => 'A related direction is near-real-time support: applying analysis to intraoperative data streams to improve situational awareness and decision-making while preserving clinician control.',

                'detail_feature_image_path' => null,
                'detail_feature_points' => [
                    'Scenario comparisons',
                    'Risk stratification',
                    'Shared planning assumptions',
                    'Decision support',
                    'Workflow alignment',
                ],

                'detail_text_7' => 'Explore more Scientific News topics via our category pages. Each category collects simplified, editorial summaries to keep the same template design while making the content easy to scan.',

                'share_pinterest_url' => '#',
                'share_linkedin_url' => '#',
                'share_instagram_url' => '#',
                'share_facebook_url' => '#',

                'is_published' => true,
                'published_at' => now(),
                'created_by' => null,
            ]
        );
    }
}
