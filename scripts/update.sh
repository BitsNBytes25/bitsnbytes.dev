#!/bin/bash
#
# update.sh
# Downloads and extracts MarkdownMasterCMS app|full tarball
#
# Usage: scripts/update.sh <stable|unstable>
#

set -euo pipefail

# Configuration

BASE_URL="https://markdownmaster.com/build"
GITHUB_URL="https://github.com/eVAL-Agency/MarkdownMasterCMS/releases/download"

# Validate arguments
if [[ $# -ne 1 ]]; then
    echo "Error: Exactly one argument required (stable or unstable)" >&2
    echo "Usage: $0 <stable|unstable>" >&2
    exit 1
fi

if [ -e themes/ ]; then
	# If themes/ exists, presume the user only wants the base application
	SCRIPT_NAME="markdownmaster-app"
else
	# If themes/ does NOT exist, download the full version with demo files
	SCRIPT_NAME="markdownmaster-full"
fi

MODE="$1"

if [[ "$MODE" != "stable" && "$MODE" != "unstable" ]]; then
    echo "Error: Invalid mode '$MODE'. Must be 'stable' or 'unstable'" >&2
    exit 1
fi

# Determine the tarball URL and filename
if [[ "$MODE" == "unstable" ]]; then
    TARBALL_URL="${BASE_URL}/${SCRIPT_NAME}-unstable.tgz"
    TARBALL_NAME="${SCRIPT_NAME}-unstable.tgz"
else
    # For stable, get latest release from GitHub API
    # Fetch the latest release asset name using jq to extract version
    RELEASE_INFO=$(curl -sL "https://api.github.com/repos/eVAL-Agency/MarkdownMasterCMS/releases/latest")
    
    if ! command -v jq &>/dev/null; then
        echo "Error: jq is required but not installed. Install with:" >&2
        echo "  Ubuntu/Debian: sudo apt-get install jq" >&2
        echo "  macOS: brew install jq" >&2
        echo "  RHEL/CentOS: sudo yum install jq" >&2
        exit 1
    fi
    
    # Extract the tarball asset name from the latest release
    TARBALL_URL=$(echo "$RELEASE_INFO" | jq -r '.assets[] | select(.name | contains("'$SCRIPT_NAME'")) | .browser_download_url' | head -n1)
    
    if [[ -z "$TARBALL_URL" ]]; then
        echo "Error: No .tgz asset found in latest release" >&2
        exit 1
    fi

    TARBALL_NAME="$(basename "$TARBALL_URL")"
fi

# Output info
echo "Mode: $MODE"
echo "Downloading: $TARBALL_URL"
echo "Extracting to: $(pwd)"
echo ""

# Create temporary directory for extraction
TEMP_DIR=$(mktemp -d)
trap 'rm -rf "$TEMP_DIR"' EXIT

# Download the tarball
echo "Fetching tarball..."
curl -L -o "$TEMP_DIR/${TARBALL_NAME}" "$TARBALL_URL"

# Extract to current directory (strip top-level directory)
echo "Extracting to $(pwd)..."
tar -xzf "$TEMP_DIR/${TARBALL_NAME}" -C "$(pwd)" --overwrite

echo ""
echo "Done! Extracted: $TARBALL_NAME"
