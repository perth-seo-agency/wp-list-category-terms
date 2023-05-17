const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.editor;
const { PanelBody, TextControl } = wp.components;

registerBlockType('wp-list-category-terms/block', {
    title: 'WP List Category Terms',
    icon: 'list-view',
    category: 'common',
    attributes: {
        taxonomy: {
            type: 'string',
            default: 'your_custom_taxonomy',
        },
    },

    edit({ attributes, setAttributes }) {
        const { taxonomy } = attributes;

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Settings">
                        <TextControl
                            label="Taxonomy"
                            value={taxonomy}
                            onChange={(taxonomy) => setAttributes({ taxonomy })}
                        />
                    </PanelBody>
                </InspectorControls>
                <div className="wp-list-category-terms">
                    <p>WP List Category Terms Block</p>
                </div>
            </>
        );
    },

    save() {
        return null;
    },
});