<?php

namespace Database\Seeders;

use App\Models\Ejournal\Setting;
use Illuminate\Database\Seeder;

class EjournalHomeSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $exists = Setting::query()->where('key', 'home')->exists();
        if ($exists) {
            return;
        }

        $home = [
            'banner' => [
                'title' => 'Advancing Medical Science Through',
                'typed_strings' => 'Peer-Reviewed Journals, High-Caliber Medical Books',
                'text' => 'Med Open Press publishes rigorously peer-reviewed medical journals and authoritative books to support clinicians, researchers, and educators worldwide.',
                'button_text' => 'Explore Journals',
                'button_url' => '/journals',
                'satisfied_partner' => [
                    'count' => 200,
                    'suffix' => 'K+',
                    'label' => 'Authors & Reviewers',
                    'images' => [
                        [],
                        [],
                    ],
                ],
                'google_rating' => [
                    'count' => 12,
                    'suffix' => 'k Ratings',
                    'stars' => 2,
                ],
            ],
            'sliding_text' => [
                'Peer Review',
                'Open Access',
                'Indexing',
                'Copyediting',
                'Ethics',
                'Publishing',
            ],
            'about' => [
                'text' => 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Each publication undergoes stringent editorial scrutiny to ensure scientific validity and clinical relevance.',
                'points' => [
                    ['icon' => 'icon-check', 'text' => 'Excellence in peer review'],
                    ['icon' => 'icon-check', 'text' => 'Global accessibility'],
                    ['icon' => 'icon-check', 'text' => 'Promotion of innovation'],
                    ['icon' => 'icon-check', 'text' => 'Commitment to education'],
                    ['icon' => 'icon-check', 'text' => 'Ethical publishing standards'],
                    ['icon' => 'icon-check', 'text' => 'Transparent editorial policies'],
                    ['icon' => 'icon-check', 'text' => 'Clinically relevant outputs'],
                    ['icon' => 'icon-check', 'text' => 'Scientific validity & rigor'],
                ],
            ],

            'about_page' => [
                'tagline' => 'About Us',
                'heading_html' => 'Our Story, Mission, Born from a passion for innovation, <span>& Values</span><br> <span>That Drive Us Forward</span>',
                'text' => 'Med Open Press is a distinguished publishing entity devoted to the advancement of medical science through the dissemination of high-caliber books and rigorously peer-reviewed journals. Our mission is to contribute to the global medical discourse by providing access to the latest research findings, educational tools, and authoritative reference materials. Each publication under our banner undergoes stringent editorial scrutiny to ensure it meets the highest standards of scientific validity and relevance, thus serving the needs of clinicians, researchers, and educators across the healthcare continuum.',
                'consultation_button_text' => 'Consultation',
                'consultation_button_url' => 'https://wa.me/628971399093',
                'office_hours' => 'Office Hours: 10:00 AM - 8:00 PM',
                'phone' => '+62 897 1399 093',
                'images' => [
                    [],
                    [],
                    [],
                ],
                'counters' => [
                    ['count' => 25, 'suffix' => '+', 'label' => 'years of editorial experience'],
                    ['count' => 98, 'suffix' => '%', 'label' => 'author satisfaction'],
                    ['count' => 198, 'suffix' => '+', 'label' => 'published works'],
                ],
                'vision' => [
                    'title' => 'Our Vision',
                    'subtitle' => 'A global exchange of knowledge that advances medicine.',
                    'text' => 'Med Open Press envisions itself as a preeminent force in medical publishing, facilitating the global exchange of knowledge that fosters innovation, enhances clinical practice, and drives progress in medical science. Our goal is to empower healthcare professionals and researchers with the resources necessary to confront and overcome the most significant health challenges of our time.',
                ],
                'mission' => [
                    'title' => 'Our Mission',
                    'subtitle' => 'How we deliver excellence, access, and trust.',
                    'points' => [
                        ['title' => 'Excellence in Publishing:', 'text' => 'To produce and disseminate peer-reviewed medical literature of the highest quality, reflecting the forefront of research and clinical practice.'],
                        ['title' => 'Global Accessibility:', 'text' => 'To ensure the worldwide accessibility of our publications, thereby bridging disparities in knowledge and practice across diverse healthcare settings.'],
                        ['title' => 'Promotion of Innovation:', 'text' => 'To collaborate with leading experts, academic institutions, and professional societies in medicine, thereby fostering the development and dissemination of pioneering research.'],
                        ['title' => 'Commitment to Education:', 'text' => 'To provide robust educational resources that support the continuous professional development of healthcare providers, enhancing their ability to deliver superior patient care.'],
                        ['title' => 'Adherence to Ethical Standards:', 'text' => 'To uphold the utmost ethical principles in all facets of publishing, guaranteeing transparency, accountability, and integrity in our operations and outputs.'],
                    ],
                ],
            ],
            'services' => [
                'tagline' => 'Our Services',
                'heading_html' => 'Medical <span>Publishing</span> Services<br><span>From submission to global dissemination</span>',
                'tabs' => [
                    [
                        'button_label' => "Book\nPublishing",
                        'slug' => 'residential',
                        'icon' => 'icon-file',
                        'title' => 'Book Publishing',
                        'text' => 'Medical books, monographs, and educational references supported by editorial review, professional copyediting, design, and production.',
                        'small_label' => 'Books',
                        'small_sublabel' => 'Publishing',
                        'button_text' => 'Learn More',
                        'button_url' => '/services',
                    ],
                    [
                        'button_label' => "Scientific Journal\nPublication",
                        'slug' => 'commercial',
                        'icon' => 'icon-review',
                        'title' => 'Scientific Journal Publication',
                        'text' => 'End-to-end journal publishing workflows: submissions, peer review coordination, editorial decisions, production, and online publication.',
                        'small_label' => 'Journals',
                        'small_sublabel' => 'Workflow',
                        'button_text' => 'Learn More',
                        'button_url' => '/services',
                    ],
                    [
                        'button_label' => "IPR\nManagement",
                        'slug' => 'deep',
                        'icon' => 'icon-completed-task',
                        'title' => 'Intellectual Property Rights Management (IPR)',
                        'text' => 'Copyright, permissions, and licensing guidance to protect author rights and support compliant publication across formats and channels.',
                        'small_label' => 'Rights',
                        'small_sublabel' => 'Compliance',
                        'button_text' => 'Learn More',
                        'button_url' => '/services',
                    ],
                    [
                        'button_label' => "Custom Publishing\nSolutions",
                        'slug' => 'office',
                        'icon' => 'icon-app',
                        'title' => 'Custom Publishing Solutions',
                        'text' => 'Tailored publishing programs for societies, institutions, special issues, and supplements with flexible workflows and timelines.',
                        'small_label' => 'Custom',
                        'small_sublabel' => 'Solutions',
                        'button_text' => 'Learn More',
                        'button_url' => '/services',
                    ],
                    [
                        'button_label' => "Distribution\n& Licensing",
                        'slug' => 'sanitizing',
                        'icon' => 'icon-share',
                        'title' => 'Distribution and Licensing',
                        'text' => 'Digital/print distribution options and licensing pathways to expand reach responsibly across platforms, partners, and regions.',
                        'small_label' => 'Reach',
                        'small_sublabel' => 'Licensing',
                        'button_text' => 'Learn More',
                        'button_url' => '/services',
                    ],
                ],
            ],
            'counters' => [
                [
                    'icon' => 'icon-completed-task',
                    'count' => 100,
                    'suffixes' => '+',
                    'label' => 'Articles published',
                ],
                [
                    'icon' => 'icon-review',
                    'count' => 98,
                    'suffixes' => '%',
                    'label' => 'Trusted by happy Customer!',
                ],
                [
                    'icon' => 'icon-experience',
                    'count' => 12,
                    'suffixes' => 'k|+',
                    'label' => 'Positive Rating in Trustpilot',
                ],
                [
                    'icon' => 'icon-costumer',
                    'count' => 35,
                    'suffixes' => 'm',
                    'label' => 'Rating in oy local City Network',
                ],
            ],
            'featured' => [
                'tagline' => 'Featured Publications',
                'heading_html' => 'A selection of publications <span>that</span><br><span>advance medical knowledge</span>',
                'filters' => [
                    ['filter' => '.filter-item', 'label' => 'All', 'icon' => 'icon-catagory'],
                    ['filter' => '.corporate', 'label' => 'Clinical Research', 'icon' => 'icon-pen-ruler'],
                    ['filter' => '.house', 'label' => 'Reviews', 'icon' => 'icon-computer'],
                    ['filter' => '.cargarage', 'label' => 'Case Reports', 'icon' => 'icon-bullhorn'],
                    ['filter' => '.bakery', 'label' => 'Public Health', 'icon' => 'icon-bullhorn'],
                    ['filter' => '.sparklyclean', 'label' => 'Medical Education', 'icon' => 'icon-bullhorn'],
                ],
                'cta' => [
                    'title_html' => 'Do you have any project<br>ideas in mind?',
                    'sliding_text' => 'Get In Touch',
                    'support_label' => 'Need Support?',
                    'phone' => '+62 897 1399 093',
                    'button_text' => 'View More\nProject',
                    'button_url' => '/project-details',
                ],
                'items' => [
                    [
                        'filter_classes' => 'house sparklyclean bakery',
                        'tag' => 'Original Research',
                        'date' => 'November 24',
                        'title' => 'Clinical Evidence in Practice',
                        'link_text' => 'View More',
                        'link_url' => '/project-details',
                    ],
                    [
                        'filter_classes' => 'corporate bakery',
                        'tag' => 'Review Article',
                        'date' => 'November 24',
                        'title' => 'State-of-the-Art Review',
                        'link_text' => 'View More',
                        'link_url' => '/project-details',
                    ],
                    [
                        'filter_classes' => 'cargarage house bakery',
                        'tag' => 'Case Report',
                        'date' => 'November 24',
                        'title' => 'Clinical Case Insights',
                        'link_text' => 'View More',
                        'link_url' => '/project-details',
                    ],
                    [
                        'filter_classes' => 'corporate cargarage sparklyclean',
                        'tag' => 'Moveout',
                        'date' => 'November 24',
                        'title' => 'Eco Gleam Crew',
                        'link_text' => 'View More',
                        'link_url' => '/project-details',
                    ],
                    [
                        'filter_classes' => 'corporate bakery house',
                        'tag' => 'Specialized',
                        'date' => 'November 24',
                        'title' => 'Neat Nest Pros',
                        'link_text' => 'View More',
                        'link_url' => '/project-details',
                    ],
                ],
            ],
            'blog' => [
                'tagline' => 'OUR INSIGHT',
                'heading_html' => 'Discover Insights and <span>Tips</span> <br><span>in Our Latest Articles</span>',
                'button_text' => 'View All Scientific News',
                'button_url' => '/blog-list',
                'cards' => [
                    [
                        'day' => '05',
                        'month' => 'NOV',
                        'tags' => 'Cardiology and Cardiovascular Medicine|Internal Medicine',
                        'title' => 'Reporting Standards for Cardiology & Internal Medicine Manuscripts',
                        'text' => 'Practical tips for outcomes, methods clarity, and ethical disclosures.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '24',
                        'month' => 'APR',
                        'tags' => 'Orthopedics and Sports Medicine|Neurosurgery',
                        'title' => 'Surgical Case Reports: Orthopedics & Neurosurgery Submission Essentials',
                        'text' => 'Consent, imaging, and follow-up reporting tips for high-quality cases.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '12',
                        'month' => 'Sep',
                        'tags' => 'Dermatology|Obstetrics & Gynecology',
                        'title' => 'Clinical Images & Figures: Dermatology and OB/GYN Best Practices',
                        'text' => 'Resolution, anonymization, and figure legends for submission.',
                        'link_url' => '/blog-details',
                    ],
                    [
                        'day' => '30',
                        'month' => 'DEC',
                        'tags' => 'Psychiatry and Mental Health|Urology',
                        'title' => 'Ethics & Sensitive Data: Psychiatry and Urology Research Submissions',
                        'text' => 'Guidance on consent, confidentiality, and responsible reporting.',
                        'link_url' => '/blog-details',
                    ],
                ],
            ],

            'contact' => [
                'tagline' => 'CALL TO ACTION',
                'heading_html' => 'Connect with our editorial team,<br>discuss submissions, peer review, and publishing policies',
                'name_placeholder' => 'Name*',
                'email_placeholder' => 'Email*',
                'phone_placeholder' => 'Phone*',
                'subject_placeholder' => 'Subject*',
                'subject_options' => [
                    'Manuscript Submission',
                    'Peer Review',
                    'Publishing Ethics',
                    'Open Access',
                    'Indexing & Archiving',
                ],
                'message_placeholder' => 'Write a your Message',
                'button_text' => 'Send Message',
            ],

            'manuscript' => [
                'title' => 'Submit Manuscript',
                'subtitle' => 'Request editorial guidance and publication information.',
                'name_placeholder' => 'Your Name',
                'email_placeholder' => 'Your Email',
                'phone_placeholder' => 'Phone',
                'category_placeholder' => 'Choose a Category',
                'category_options' => [
                    'Original Research',
                    'Review Article',
                    'Case Report',
                    'Short Communication',
                ],
                'button_text' => 'Request Info',
            ],

            'testimonials' => [
                'tagline' => 'OUR TESTIMONIAL',
                'heading_html' => 'Clients Have to Say <span>About Their</span><br><span>Experience with Us!</span>',
                'items' => [
                    [
                        'name' => 'Emily Carter',
                        'role' => 'Business Owner',
                        'sub_title' => 'Rigorous and transparent!',
                        'text' => '"The peer review process was thorough and constructive.<br>The editorial communication was clear, timely, and professional."',
                        'rating' => 5,
                        'date' => '10 Days Ago',
                        'link_url' => '/testimonials',
                    ],
                    [
                        'name' => 'Michael Brown',
                        'role' => 'Financial Analyst',
                        'sub_title' => 'Efficient and dependable!',
                        'text' => '"From submission to decision, the workflow was well-managed.<br>The guidance helped us improve the manuscript substantially."',
                        'rating' => 5,
                        'date' => '10 Days Ago',
                        'link_url' => '/testimonials',
                    ],
                    [
                        'name' => 'Sarah Thompson',
                        'role' => 'Marketing Manager',
                        'sub_title' => 'High-quality editorial support!',
                        'text' => '"Copyediting and production were excellent.<br>The final publication was polished, readable, and consistent."',
                        'rating' => 5,
                        'date' => '10 Days Ago',
                        'link_url' => '/testimonials',
                    ],
                    [
                        'name' => 'John Peterson',
                        'role' => 'Software Developer',
                        'sub_title' => 'A great publishing partner!',
                        'text' => '"We value the ethical standards and transparency.<br>Open access distribution helped our work reach a broader audience."',
                        'rating' => 5,
                        'date' => '10 Days Ago',
                        'link_url' => '/testimonials',
                    ],
                ],
            ],
        ];

        Setting::putValue('home', $home);
    }
}
