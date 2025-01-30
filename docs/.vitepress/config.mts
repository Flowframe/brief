import { defineConfig } from 'vitepress'

export default defineConfig({
    title: 'Brief',
    description: 'Build mail templates for PHP with Brief',
    themeConfig: {
        logo: '/logo.svg',

        search: {
            provider: 'local',
        },

        nav: [
            {
                text: 'Docs',
                link: '/docs/what-is-brief',
                activeMatch: '/docs/',
            },
        ],

        footer: {
            message: 'Released under the MIT License.',
            copyright: 'Copyright © 2025-present Flowframe',
        },

        sidebar: {
            '/docs/': [
                {
                    text: 'Introduction',
                    base: '/docs/',
                    items: [
                        { text: 'What is Brief?', link: 'what-is-brief' },
                        { text: 'Getting started', link: 'getting-started' },
                    ],
                },
                {
                    text: 'Components',
                    base: '/docs/components/',
                    items: [
                        { text: 'Body', link: 'body' },
                        { text: 'Button', link: 'button' },
                        { text: 'Column', link: 'column' },
                        { text: 'Container', link: 'container' },
                        { text: 'Font', link: 'font' },
                        { text: 'Head', link: 'head' },
                        { text: 'Hr', link: 'hr' },
                        { text: 'Html', link: 'html' },
                        { text: 'Img', link: 'img' },
                        { text: 'Link', link: 'link' },
                        { text: 'Preview', link: 'preview' },
                        { text: 'Row', link: 'row' },
                        { text: 'Section', link: 'section' },
                        { text: 'Text', link: 'text' },
                    ],
                },
                {
                    text: 'Rendering',
                    base: '/docs/rendering/',
                    items: [
                        { text: 'HTML', link: 'html' },
                    ],
                },
                {
                    text: 'Styling',
                    base: '/docs/styling/',
                    items: [
                        { text: 'Atomic', link: 'atomic' },
                        { text: 'Presets', link: 'presets' },
                        { text: 'Rules', link: 'rules' },
                    ],
                },
            ],
        },

        socialLinks: [
            { icon: 'github', link: 'https://github.com/flowframe/brief' },
            { icon: 'x', link: 'https://x.com/larsklopstra' },
        ],

        editLink: {
            pattern:
                'https://github.com/flowframe/brief/edit/master/docs/:path',
            text: 'Edit this page on GitHub',
        },
    },
})
